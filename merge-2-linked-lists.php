<?php


 // Definition for a singly-linked list.
 class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val = 0, $next = null) {
         $this->val = $val;
         $this->next = $next;
     }
 }
 
class Solution {

    /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
        
        if($list1 == null) return $list2;
        if($list2 == null) return $list1;
        
		if($list1->val < $list2->val) {
		    $list1->next = $this->mergeTwoLists($list1->next, $list2);
		    return $list1;
		} else {
		    $list2->next = $this->mergeTwoLists($list2->next, $list1);
		    return $list2;
		}

    }

    function listLength(ListNode $list) {
        $count = 0;
        while($list->next != null) {
            $count++;
            $list = $list->next;
        }
        echo $count . "\n";
        return $count;
    }
}

$ls1 = new ListNode(1, (new ListNode(2, new ListNode(4, null))));
$ls2 = new ListNode(1, (new ListNode(3, new ListNode(4, null))));


$sol = new Solution();
$f = $sol->mergeTwoLists($ls1, $ls2);
print_r($f);