"use strict";

$("input[type='radio'][name='color']").click(function () {
  console.log($('input[name=color]:checked').val());
});