<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function getHighestScore($intQuizId) {
    $this->load->model('member');
    return $this->member->getHighestScore($intQuizId);
}


