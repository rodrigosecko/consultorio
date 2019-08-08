<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Activos</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 15px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .code {
            font-size: 8px;
        }

        tr.border_bottom td {
          border-bottom:1pt solid black;
         
        }

        .invoice table {
            margin: 15px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            background-color: #60A7A6;
            color: #FFF;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/barcode/jquery-barcode.js"></script>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 25%;">
                <h3></h3>
                <pre>
Av. Mcal. Santa Cruz - Edif. La Primera
P.8 Bloque A Of.1
La Paz - Bolvia
                    <br /><br />
Fecha: La Paz <?php echo $fecha; ?>  de mayo de 2019                  
                </pre>


            </td>
            <td align="center">
               
               <img src="<?php echo base_url(); ?>public/assets/images/reporte/logo.png" alt="Logo" width="96" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>Constructora Consorcio Ryuno Noeval</h3>
                <pre>
                    Tel/fax.: (591-2) 2900442
                    Email.: ryuno-noevaI@hotmail.com
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>




<div class="invoice">
    <h3 align="center">CODIGOS QR DE ACTIVOS FIJOS</h3>
         
    <table width="30%" class="code">
        
        <tbody>            
            <?php foreach ($data_table_activos as $row) { ?>
                <tr class="border_bottom">                    
                    
                    <td align="center"><img src="<?php echo base_url(); ?>images/<?php echo $row->activo_id.'.png';?>" alt="Logo" width="78" class="logo"/>
                        <?php echo $row->codigo; ?> 
                    </td>
                    <td align="left">
                      <br><br><br> <br>   
                        <img src="<?php echo base_url(); ?>public/assets/images/reporte/logoqr.png" alt="Logo" width="56" class="logo"/>
                        <p> </p>
                        Constructora Ryuno Noeval   

                          <pre>
                                                       
                                  
                </pre>

                        </td>  
                </tr>
                <?php 
            } ?>
        </tbody>
    </table>
    <p>


    
    <br><br>
    


</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; Ryuno Noeval-2019 Todos los derechos reservados.
            </td>
            <td align="right" style="width: 50%;">
                Company Slogan
            </td>
        </tr>

    </table>
</div>
<script>
    $("#barcode").barcode(
"<?php echo $row->codigo; ?>",
//"ASDAD1234567890128", // Value barcode (dependent on the type of barcode)
"code39" // type (string)
);
</script>
</body>
</html>