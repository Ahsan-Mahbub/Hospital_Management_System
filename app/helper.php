<?php

if(!function_exists('getAvailableDays')) {
    function getAvailableDays() {
        return [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        ];
    }
}

if(!function_exists('getAvailableBloodGroup')) {
    function getAvailableBloodGroup() {
        return [
            'A(+ve)',
            'A(-ve)',
            'B(+ve)',
            'B(-ve)',
            'AB(+ve)',
            'AB(-ve)',
            'O(+ve)',
            'O(+ve)',
        ];
    }
}