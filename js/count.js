$.Tween.propHooks.number = {
    get: function(tween) {
      var num = tween.elem.innerHTML.replace(/^[^\d-]+/, "");
      return parseFloat(num) || 0;
    },
  
    set: function(tween) {
      var opts = tween.options;
      tween.elem.innerHTML =
        (opts.prefix || "") +
        tween.now.toFixed(opts.fixed || 0) +
        (opts.postfix || "");
    }
  };
  
  $("#num-1").animate(
    { number: 280 },
    {
      duration: 5000,
      postfix: "+"
    }
  );

  $("#num-2").animate(
    { number: 280 },
    {
      duration: 5000,
      postfix: "+"
    }
  );

  $("#num-3").animate(
    { number: 10 },
    {
      duration: 5000,
      postfix: "+"
    }
  );

  $("#num-4").animate(
    { number: 15 },
    {
      duration: 5000,
      postfix: "+"
    }
  );
  
  // $("#num-2")
  //   .delay(5000)
  //   .animate(
  //     { number: 450 },
  //     {
  //       duration: 5000,
  //       postfix: "+"
  //     }
  //   );
  
  // $("#num-3")
  //   .delay(5000)
  //   .animate(
  //     { number: 300 },
  //     {
  //       duration: 5000,
  //       postfix: "+"
  //     }
  //   );
  
  // $("#num-4")
  //   .delay(5000)
  //   .animate(
  //     { number: 50 },
  //     {
  //       duration: 5000,
  //       postfix: "+"
  //     }
  //   );