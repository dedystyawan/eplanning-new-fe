<?php

function cetak($str)
{
  echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}

function cetakv2($str)
{
  return htmlentities($str, ENT_QUOTES, 'UTF-8');
}
