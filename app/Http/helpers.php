<?php

function apiReturn ($message, $success = 0, $moreData = []) {
	return array_merge(compact('message', 'success'), $moreData);
}

function jsonReturn ($message, $success = 0, $moreData = []) {
	return json_encode(apiReturn($message, $success, $moreData));
}