<?php

use Illuminate\Support\Facades\Request;

/**
 * Generate user logs
 *
 */
 function log_client()
 {
     $user_agent = Request::userAgent();
     $method = Request::method();
     $ip = Request::ip();

     return $method . ' ' . now() . ': (' . $ip . ') ' . $user_agent;
 }

 /**
  * Get random alpha-num string
  *
  */
  function rand_alphanum($size=12)
  {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $alphID = '';
      for ($i = 1; $i <= $size; $i++) {
        $alphID .= $characters[rand(0, strlen($characters)-1)];
      }
      return $alphID;
  }


  function valid_format($date)
  {
      $date_array = explode("-", $date);
      dump($date_array);

      return true;
  }

  function first_of_month()
  {
      // Get First And Last Days Of Current Month
      $timestamp = strtotime(date('f Y'));
      $month_start = date('Y-m-01', $timestamp);
      return $month_start;
  }

  function last_of_month()
  {
      $timestamp = strtotime(date('f Y'));
      $month_end = date('Y-m-t', $timestamp);
      return $month_end;
  }

  function last_month()
  {
      return date('F',strtotime('-1 months'));
  }

  function date_to_string($date)
  {
      return date('j F Y', strtotime($date));
  }

  function todays_date()
  {
      return date('F d, Y', strtotime(today('America/New_York')));
  }

  function days_remaining()
  {
      $timestamp = strtotime(date('f Y'));
      return date('t', $timestamp) - date('d', strtotime(today()));
  }
