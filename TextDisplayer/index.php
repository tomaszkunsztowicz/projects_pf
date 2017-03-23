<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Text displayer v.1.0</title>
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
        
        <script src="filesaver.js"></script>
        <script src="jquery.wordexport.js"></script>
        
    </head>
         <div class="row">
  <div class="col-sm-12">
        <div class="panel panel-default">
        <div class="panel-heading">The content of your text below</div>
        <div class="panel-body"><textarea rows="4" cols="50" id="text" style="resize:none">TEST
        </textarea>
        <input type="file" onchange="onFileSelected(event)" id="file_upload">
        </div>
        
       </div>
  
  </div>
  
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">Operations</div>
            <div class="panel-body">
            <div class="btn-group">
            <button class="btn btn-primary" id="clear_text">Clear text</button>
            <button class="btn btn-primary" id="incr_font">Text size +</button>
            <button class="btn btn-primary" id="decr_font">Text size -</button> 
            <button class="btn btn-primary" id="change_font">Change font</button>
                <div id="dialog-2" title="Change font">
                    <div class="radio">
                          <label><input type="radio" name="optradio" id="font_times">Times New Roman</label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="optradio" id="font_arial">Arial</label>
                          </div>      
                    </div>
  
            <button class="btn btn-primary" id="high_contrast">High contrast</button>
            <button class="btn btn-primary" id="export_pdf">Export as pdf</button>
                
            <button class="btn btn-primary" id="export_doc">Export as doc  
            </button>
            <button class="btn btn-primary" id="about">About</button>
                <div id="dialog-1" title="About the app">Text Displayer v.1.0 Webit 2016 Copyright</div>
            </div>
            </div>
        </div>
</div>    
          
        <script type="text/javascript">
        $(document).ready(function() { 
    
        $( "#clear_text, #incr_font, #decr_font, #high_contrast,#about, #change_font, #export_pdf, #export_doc").button();
    
        $( "#dialog-1" ).dialog({
               autoOpen: false,  
            });
            $( "#about" ).click(function() {
               $( "#dialog-1" ).dialog( "open" );
            });    
        
        $( "#dialog-2" ).dialog({
               autoOpen: false,  
            });
            $( "#change_font" ).click(function() {
               $( "#dialog-2" ).dialog( "open" );
            });  
        
    $("#dialog-2").dialog({
      buttons : {
        "Confirm" : function() {
            
            if($('#font_times').is(':checked')) { 
            var fontvar = 'Times New Roman';    
            $('#text').css('font-family', fontvar);
            $(this).dialog("close");
            } 
            else 
            if($('#font_arial').is(':checked')) 
            { 
            var fontvar = 'Arial';    
            $('#text').css('font-family', fontvar); 
            $(this).dialog("close");
            }   
            else
            { alert("Please select font!"); }
                
        },
        "Cancel" : function() {
          $(this).dialog("close");
        }
      }
    });
         
        //get text
        $( '#get_text' ).click(function() 
        {
        $('#text').load('text.txt'); 
        }       
        );
        
        //clear text
        $( '#clear_text' ).click(function() 
        {
        $('#text').empty(); 
        }       
        );

        $( '#incr_font' ).click(function() 
        {
        curSize= parseInt($('#text').css('font-size')) + 5;
        $('#text').css('font-size', curSize);
        
        }       
        );

        $( '#decr_font' ).click(function() 
        {
        curSize= parseInt($('#text').css('font-size')) - 3;
        $('#text').css('font-size', curSize);
        
        }       
        );

        $( '#high_contrast' ).click(function() 
        {
        $('#text').css('color', 'white');
        $('#text').css('background-color', 'black');
        clicked = 0;
        }       
        );
                
        function onFileSelected(event) {
            var selectedFile = event.target.files[0];
            var reader = new FileReader();
            
            var result = document.getElementById("text");
            
            reader.onload = function(event) {
                result.innerHTML = event.target.result;
            };
            reader.readAsText(selectedFile);
            
        }
        
        $( '#file_upload' ).change(function() 
        {
            onFileSelected(event);
        }       
        );
 
        //export to pdf
        var pdf_doc = new jsPDF();

        $('#export_pdf').click(function () {
        pdf_doc.fromHTML($('#text').html(), 15, 15, {
        'width': 170});
        pdf_doc.save('sample-file.pdf');
        });
 
        $("#export_doc").click(function(event) {
	$("#text").wordExport();
	});
 
 
        });
        </script>
        
    </body>
</html>
