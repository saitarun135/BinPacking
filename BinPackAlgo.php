<?php

const BEST_FIT = 'best_fit';
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
    if($algoType == 'best_fit')
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
}

function fitsSequenceForBetterFit($itemsToFit)
{
     /** sorting for best fit */
     usort($itemsToFit,function($a,$b){
        return $b['size'] <=> $a['size'];
    });
    return $itemsToFit;
}

$binData = [['binSize' => 10 ,'name' => 'A']];
$itemsToFit = [['size'=>8], ['size' => 1.5], ['size' => 9], ['size' => 3], ['size'=> 1] ]; 
binPackAlgo($binData,$itemsToFit);
?>