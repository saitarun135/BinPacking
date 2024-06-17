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
            $bin['remainingBin'] = $remaining_bin_space;
            $bin['fitData'] = $fitItems;
        }
        $binData['unFitPieces'] = $itemsToFit;
        
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

?>