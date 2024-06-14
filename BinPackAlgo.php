<?php

/*
|--------------------------------------------------------------------------
| Bin Packing Algo
|--------------------------------------------------------------------------
| uses Best Fit Approach Data.
| $binData accepts Bin size.
| $itemsToFit accepts how many garbage bags with their sizes.
*/
    
function binPackAlgo($binData, $itemsToFit, $algoType = 'best_fit')
{
    if($algoType == 'best_fit')
    {
        /** sorting for best fit */
        usort($itemsToFit,function($a,$b){
            return $b['size'] <=> $a['size'];
        });

        foreach($binData as &$bin)
        {
            $fitItems = [];
            $remaining_bin_space = $bin['binSize'];
            foreach($itemsToFit as $key =>  $fitPiece)
            {
                if($fitPiece['size'] <= $remaining_bin_space)
                {
                    $fitItems[] = $fitPiece; 
                    unset($itemsToFit[$key]);
                    $remaining_bin_space -= $fitPiece['size'];
                    if($remaining_bin_space > 0)
                        continue;
                    else
                        break;
                }
            }
            $bin['fitData'] = $fitItems;
        }
        $binData['unFitPieces'] = $itemsToFit;
        print_r($binData);
    }
}

// Large dataset for testing
$binData = [
    ['binSize' => 10, 'name' => 'A'],
    ['binSize' => 20, 'name' => 'B'],
    ['binSize' => 10, 'name' => 'C'],
    ['binSize' => 25, 'name' => 'D'],
    ['binSize' => 30, 'name' => 'E'],
    ['binSize' => 15, 'name' => 'F'],
    ['binSize' => 18, 'name' => 'G'],
    ['binSize' => 22, 'name' => 'H'],
    ['binSize' => 12, 'name' => 'I'],
    ['binSize' => 14, 'name' => 'J'],
];

$itemsToFit = [
    ['size' => 8],
    ['size' => 3],
    ['size' => 6],
    ['size' => 15],
    ['size' => 9],
    ['size' => 4],
    ['size' => 10],
    ['size' => 12],
    ['size' => 5],
    ['size' => 7],
    ['size' => 14],
    ['size' => 11],
    ['size' => 2],
    ['size' => 1],
    ['size' => 13],
    ['size' => 17],
    ['size' => 19],
    ['size' => 20],
    ['size' => 21],
    ['size' => 16],
    ['size' => 18],
    ['size' => 22],
    ['size' => 23],
    ['size' => 24],
    ['size' => 25],
];



binPackAlgo($binData , $itemsToFit);
?>