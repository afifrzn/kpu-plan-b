<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        table{
            margin-top: 24px;
        }
        table {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 60%;
        }
        
        table td, table th {
          font-size: 12px;
          text-align: center;
          border: 1px solid #ddd;
          padding: 4px;
        
        }
        
        table tr:nth-child(even){background-color: #f2f2f2;}
        
        table tr:hover {background-color: #ddd;}
        
        table th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #008CBA;
          color: white;
        }

        td button{
          border: none;
          padding: 7px 16px;
          
          display: inline-block;
          font-size: 12px;
            
        }

        .edit{
            background-color: #097969;
        }

        .delete{
            margin-left: 24px;
            background-color: #FF3F29;
        }

        td button a {
            text-align: center;
            color: white;
            text-decoration: none;
        }

        .data-name{
            width: 360px;
        }
    </style>
</head>
<body>
    <div style="display: flex;" >
    
    <table>
        
    </table>
    </div>

    
</body>
</html>