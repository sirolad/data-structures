<?php

class heapSort {
    /**Change first value to the end of array recursively
     *
     * @param array $array
     * @return array
     */
    public function heap(&$array) {
        $length=count($array);
        $this->heapify($array,$length);
        $end=$length-1;
        while ($end>0) {
            $tmp=$array[0];
            $array[0]=$array[$end];
            $array[$end]=$tmp;
            $end=$end-1;
            $this->siftDown($array,0,$end);
        }
        return $array;
    }

    /**Build binary tree
     *
     * @param array $array
     * @param integer $count
     */
    private function heapify(&$array,$count) {
        $start=floor(($count-2)/2);
        while ($start>=0) {
            $this->siftDown($array,$start,$count-1);
            $start=$start-1;
        }
    }
    /**Arrange tree branch: parent node bigger than his children
     *
     * @param array $array
     * @param integer $start
     * @param integer $end
     * @return when tree is sorted
     */
    private function siftDown(&$array,$start,$end) {
        $root=$start;
        while ($root*2+1<=$end) {
            $left=$root*2+1;
            $swap=$root;
            //check who is the bigger between root,left child and right child
            if ($array[$swap]<$array[$left]){
                $swap=$left;
            }
            if ($left+1<=$end && $array[$swap]<$array[$left+1]){
                $swap=$left+1;
            }
            //swap root with bigger children (if exist)
            if ($swap!=$root) {
                $tmp=$array[$root];
                $array[$root]=$array[$swap];
                $array[$swap]=$tmp;
                $root=$swap;
            } else return;
        }
    }
}
$arr = [ 12, 11, 13, 5, 6, 7];
$heap = new heapSort;
print_r($heap->heap($arr));
