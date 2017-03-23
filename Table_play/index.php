<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
              <!-- jQuery library -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.debug.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" />
        
    </head>
    <body>
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">Table Play v.1.0
                <button id="about">About</button>
                <div id="dialog-1" title="About the app">Table Play v.1.0 Webit 2016 Copyright</div>
                </div>
                <div class="panel-body">
                    <button id="gen">Generate table</button>
                    <button id="clear">Clear table</button>
                    <button id="start">Start</button>
                    <button id="stop">Stop</button>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Table type     
                </div>
                <div class="panel-body">
                  <div class="radio">
                        <label><input type="radio" name="optradio" id="gen_table_str">Strings</label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="optradio" id="gen_table_col">Colors</label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="optradio" id="gen_table">Numbers</label>
                      </div>  
                </div>
            </div>
            
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">Table panel</div>
            <div class="panel-body">
                <table id="table">
                </table>      
                <div id="max">
                </div>
                <div id="min">
                
                </div>         
            </div>   
        </div>    
   
        <div id="warning" class="alert alert-warning">
                <strong>Warning!</strong> Please select table type.
                </div>
    </body>
    
    <script>
        $(document).ready(           
       function() {
     
        $( '#clear' ).click(clear);
        $( '#start' ).click(start);
        $(' #warning').hide();
        
        $('#gen').click(function() {
        if($('#gen_table_col').is(':checked')) { 
            $( '#gen' ).click(table_col);
            } 
        else if
            ($('#gen_table_str').is(':checked')) { 
            $( '#gen' ).click(table_str);
            } 
        else if ($('#gen_table').is(':checked')) { 
            $( '#gen' ).click(table_int);
            } 
            else          
            { $(' #warning').show(); }      
        });


            $( "#dialog-1" ).dialog({
               autoOpen: false  
            });
            $( "#about" ).click(function() {
               $( "#dialog-1" ).dialog( "open" );
            });       
         
       }); 
       

       
        function clear() {
            $( "#table" ).empty();
            $( "#max" ).empty();
            $( "#min" ).empty(); 
            $(' #warning').hide();
        }
        
        function table_int() {
            
            //clear table
            clear(); 
                       
            //function draw array
            var array = new Array(10); 
            var tbody = $('#table');
   
            for (i = 0; i < 10; i++) { 
                var tr = $('<tr/>').appendTo(tbody);
                for (j = 0; j < 10; j++) { 
                    array[i,j] = Math.round(Math.random() * 1000); 
                    tr.append('<td>' +array[i,j] + '</td>');
                } 
            }  
            //funkcjie max i min
            var max = Math.round(Math.max.apply(Math, array)); // 3
            var min = Math.round(Math.min.apply(Math, array)); // 1
            $('#max').text('Table maximum :' + max);
            $('#min').text('Table minimum :' + min);
       }
       
       //getmax
       
       //getmin
         
       function table_str() {
            
            //clear table
            clear();               
            //function draw array
            var array = new Array(10); 
            var tbody = $('#table');
            
            for (i = 0; i < 10; i++) { 
                var tr = $('<tr/>').appendTo(tbody);
                for (j = 0; j < 10; j++) { 
                    array[i,j] = genString(); 
                    tr.append('<td>' +array[i,j] + '</td>');
                } 
            }    
       }
       
       function genString()
            {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for( var i=0; i < 5; i++ )
                    text += possible.charAt(Math.floor(Math.random() * possible.length));

                return text;
            }
   
       function table_col() {
            
            //clear table
            clear();
            //function draw array
            var array = new Array(10); 
            var tbody = $('#table');
            
            for (i = 0; i < 10; i++) { 
                var tr = $('<tr/>').appendTo(tbody);
                for (j = 0; j < 10; j++) { 
                    array[i,j] = '#'+Math.floor(Math.random()*16777215).toString(16);
                    $('tr').css('background-color', 'black');
                    tr.append('<td bgcolor="'+array[i,j]+'">' +array[i,j] + '</td>');
                } 
            }    
       } 
    
      // interval between items
      function start() { 
        var itemInterval = 75;
        var infiniteLoop;//this contains the id of the interval to be used in clearinterval by the way
        setTimeout(function(){
              // this code will run only once, one second after the page loads.
              table_col();
              infiniteLoop = setInterval(table_col, itemInterval);
              // commence loop that will run forever unless you use clearinterval(infiniteLoop);
        }, 1000);
    }
        // start loop
   
   
   </script>
</html>

