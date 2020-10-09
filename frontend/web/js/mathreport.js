
window.MathJax = {
    loader: {load: ['input/asciimath']},
    startup: {
      pageReady: function () {
        //
        // Synchronize menu renderer item with on-screen popup menu
        //
        /*
        var renderer = MathJax.startup.document.menu.settings.renderer;
        var select = document.getElementById('Renderer');
        var item = MathJax.startup.document.menu.menu.getPool().lookup('renderer');
        select.value = renderer;
        if (renderer !== 'CHTML') item.setValue(renderer);
        item.registerCallback(function () {
          var value = item.getValue();
          if (value !== select.value) select.value = value;
        });
        window.setMode = function (renderer) {
          if (item.getValue() !== renderer) item.setValue(renderer);
        }*/
        //
        //  Set up processing of input content
        //
        
  
        return MathJax.startup.defaultPageReady();
      }
    },
    tex: {
      inlineMath: [['$', '$'], ['\\(', '\\)']],
      processEscapes: true
    }
  };
  