<?php

const BEST_FIT = 'best_fit';
const CLEAR_HOUSE = 'clear_house';
/*
|--------------------------------------------------------------------------
| Bin Packing Algo
|--------------------------------------------------------------------------
| uses Best Fit Approach Data.
| $binData accepts Bin size.
| $itemsToFit accepts how many garbage bags with their sizes.
*/
    
function binPackAlgo($binData, $itemsToFit, $algoType = BEST_FIT)
{
    if($algoType == BEST_FIT)
    {
        $itemsToFit = fitsSequenceForBetterFit($itemsToFit);
        foreach($binData as &$bin)
        {
            $fitItems = [];
            $remaining_bin_space = $bin['binSize'];
            $position = 0;
            foreach($itemsToFit as $key =>  $fitPiece)
            {
                if($fitPiece['size'] <= $remaining_bin_space)
                {
                    $fitPiece['head'] = $position;
                    $fitPiece['tail'] = $fitPiece['size'];
                    $position = $fitPiece['size'];
                    $fitItems[] = $fitPiece; 
                    unset($itemsToFit[$key]);
                    $remaining_bin_space -= $fitPiece['size'];
                    if($remaining_bin_space > 0)
                        continue;
                    else
                        break;
                }
            }
            $bin['remainingBin'] = $remaining_bin_space;
            $bin['fitData'] = $fitItems;
        }
        $binData['unFitPieces'] = $itemsToFit;
        print_r($binData);
        return $binData;
    }
    elseif($algoType == CLEAR_HOUSE)
    {
        foreach ($binData as $bin) {
            $binSize = $bin['binSize'];
            $possibleFits = fitsSequenceForPossibleScenarios($itemsToFit, $binSize);
            $allCombinations = getAllValidCombinations($possibleFits, $binSize);
    
            echo "Bin: " . $bin['name'] . "\n";
            echo "Possible item combinations:\n";
            foreach ($allCombinations as $combination) {
                $totalSize = array_sum(array_column($combination, 'size'));
                echo "Combination: [";
                foreach ($combination as $item) {
                    echo " " . $item['size'];
                }
                echo " ] - Total size: " . $totalSize . "\n";
            }
            echo "\n";
        }
    }
    else{
        return ['status' => false , 'message' => 'Requested type we are not supporting yet!'];
    }
}

function fitsSequenceForPossibleScenarios($itemsToFit, $size)
{
    $possibleItems = [];
    foreach ($itemsToFit as $item) {
        if ($item['size'] <= $size) {
            $possibleItems[] = $item;
        }
    }
    return $possibleItems;
}

function fitsSequenceForBetterFit($itemsToFit)
{
     /** sorting for best fit */
     usort($itemsToFit,function($a,$b){
        return $b['size'] <=> $a['size'];
    });
    return $itemsToFit;
}

function getAllValidCombinations($items, $binSize)
{
    $combinations = [];
    $numItems = count($items);

    // DP array to store the valid combinations
    $dp = array_fill(0, $binSize * 10 + 1, []);
    $dp[0] = [[]];

    foreach ($items as $item) {
        $itemSize = intval($item['size'] * 10);
        for ($i = $binSize * 10; $i >= $itemSize; $i--) {
            if (!empty($dp[$i - $itemSize])) {
                foreach ($dp[$i - $itemSize] as $combination) {
                    $newCombination = array_merge($combination, [$item]);
                    $dp[$i][] = $newCombination;
                }
            }
        }
    }

    // Collect all unique combinations
    foreach ($dp as $validCombinations) {
        foreach ($validCombinations as $combination) {
            $combinations[] = $combination;
        }
    }

    return $combinations;
}
$binData = [
    ['binSize' => 10, 'name' => 'A'],
    // ['binSize' => 15, 'name' => 'B'],
    // ['binSize' => 20, 'name' => 'C'],
    // ['binSize' => 25, 'name' => 'D'],
];

$itemsToFit = [
    ['size' => 1], ['size' => 0.5], ['size' => 9], ['size' => 3], ['size' => 0.5], ['size' => 0.2], ['size' => 0.1],
    // ['size' => 5], ['size' => 4], ['size' => 6], ['size' => 2], ['size' => 7], ['size' => 8], ['size' => 1.5], 
    // ['size' => 3.5], ['size' => 0.8], ['size' => 2.5], ['size' => 1.2], ['size' => 1.8], ['size' => 4.5],
    // ['size' => 5.5], ['size' => 6.5], ['size' => 7.5], ['size' => 8.5], ['size' => 9.5], ['size' => 0.7],
];

binPackAlgo($binData,$itemsToFit,'clear_house');
?>