<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte </title>

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
            font-size: 14px;
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
Av. Mcal. Santa Cruz
P.8 Bloque A Of.1
La Paz - Bolvia
                    <br /><br />
Fecha: La Paz <?php echo $dia; ?>  de <?php echo $mes; ?> de 2019                  
                </pre>


            </td>
            <td align="center">
               
               <img src="<?php echo base_url(); ?>public/assets/images/reporte/dental_logo.png" alt="Logo" width="200" class="logo"/>
            </td>
            <td align="right" style="width: 40%;">

                <h3>Consultorio Dental</h3>
                <pre>
                    Tel/fax.: (591-2) 2900442
                    Email.: dentalSoft@hotmail.com
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>




<div class="invoice">
    <h3 align="center">Registro de consulta</h3>
         
   
    <p>


    
    <br><br>
     <table width="100%">
        <tr>
            <td align="left" style="width: 5%;">                
                <pre><b>
                    Doctor:
                    Especialidad:
                    Paciente:   
                    Carnet de Identidad: 
                    Costo Total:                                     
                    A cuenta: 
                    Saldo: 
                    <br />                                  
                </pre>
            </td>
            <td align="left" style="width: 5%;">                
                <pre>
                    <?php echo $data->doctor ?><p></p>
                    <?php echo $data_dr->descripcion ?><p></p>
                    <?php echo $data->paciente ?><p></p>
                    <?php echo $data->ci ?><p></p>
                    <?php echo $data->costo.' Bs.' ?><p></p>
                    <?php echo $data->acuenta.' Bs.' ?><p></p>
                    <?php echo $data->saldo.' Bs.' ?>
                 <br /> 
                                                   
                </pre>
            </td>
        </tr>

          <tr>
            <td align="left" style="width: 5%;">                
                <pre>
                      <b>Diagnostico:</b><br>
                      <p align="center">
                          <?php echo $data->diagnostico ?> 
                      </p>
                                                           
                    
                                                    
                </pre>
            </td>
           
        </tr>


          <tr>
            <td align="left" style="width: 5%;">                
                <pre>
                      <b>Tratamiento:</b><br>
                      <p align="center">
                     <?php echo $data->tratamiento ?>    </p>                                    
                    
                                                    
                </pre>
            </td>
           
        </tr>
    </table>

      

     <table width="100%">        
        <tbody>
        <tr>
            <td align="center" style="width: 100%;">
                <br><br><br><br><br><br><br>
                    .........................................................<p></p>      
                    <?php echo $data_dr->doctor ?>    </p>   <p></p>   
                    <?php echo $data_dr->descripcion ?>    </p>   <p></p>      
              
              
            </td>
                     
        </tr>
      
     
        <tr>
            <td></td>
            <td></td>         
        </tr>
        </tbody>     
    </table>
    


</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; DentalSoft-2019 Todos los derechos reservados.
            </td>
            <td align="right" style="width: 50%;">
                
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