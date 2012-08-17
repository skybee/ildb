<html>
 <head>
         <title>Drag & Drop test</title>
         <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
         <script type="text/javascript" src="/js/jquery-ui-1.8.18.custom.min.js"></script>
         
         <style type="text/css">
         td.drop,
         td.drop2{
                 border:1px solid black;
                 width:5em;
                 height:5em;
                 padding:0.5em;
         }
         
         div.drag{
                 border:1px solid black;
                 width:3em;
                 height:3em;
                 background:red;
                 color:white;
         }
         </style>
 </head>
 <body> 
 
 <script type="text/javascript">
 $(document).ready(function(){
         $('div.drag').draggable({
                 helper : 'clone',
                 opacity : 0.3
         });
         
         $('td.drop').droppable({
                 tolerance : 'fit',
                 accept : 'div.drag',
                 drop : function(event, ui) {
                         $(this).append(ui.draggable);
                 }
         });
 });
 </script> 
 
 <table>
 <tr>
 <td class="drop">
 <div class="drag">drag me</div>
 drop here
 </td>
 <td class="drop">drop here</td>
 <td class="drop">drop here</td>
 </tr>
 <td class="drop2">forbidden</td>
 <td class="drop2">forbidden</td>
 <td class="drop2">forbidden</td>
 </tr>
 </table> 
 
 </body>
 </html>