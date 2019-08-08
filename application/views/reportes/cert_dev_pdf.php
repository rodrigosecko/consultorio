<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acta de devolucion</title>

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
Fecha: La Paz 05 de mayo de 2019                  
                </pre>


            </td>
            <td align="center">
                <!--<img src="<?php echo base_url(); ?>public/assets/images/reporte/icono_emp.jpg" alt="Logo" width="64" class="logo"/>-->
                <img src="d:/logo.png" alt="Logo" width="96" class="logo"/>
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
    <h3 align="center">ACTA DE DEVOLUCION DE ACTIVO FIJO</h3>
        <div id="barcode" align="right"></div>
        <table width="100%" >      
           <tbody>           
                <tr align="center" style="width: 50%;">
                    <td><img src="" alt="Logo" width="128" class="logo"/><p></p>
                        <?php ?></td>                        
                </tr>              
        </tbody>
        
    </table>
     <table width="100%">
        <tr>
            <td align="left" style="width: 10%;">                
                <pre><b>
                    Oficina:   
                    Responsable:                 
                    Rubro contable:
                    Tipo de bien:
                    Estado del bien:</b>
                    <br />                                  
                </pre>
            </td>
            <td align="left" style="width: 100%;">                
                <pre>
                    Almacen
                    Efraín Soliz Mendoza
                    Muebles y enseres de oficina
                    Escritorio                    
                    Nuevo
                    <br /><br />                                    
                </pre>
            </td>
        </tr>
    </table>



<table width="100%">
        <tr>
            <td align="justify" style="width: 100%;">
           En la ciudad de La Paz en fecha se procede a la asignacion del bien de acuerdo al siguiente detalle:                  
        </td>
       
    </tr>
</table>

    <table width="100%" >
        <thead>
            <tr>
               
                <th>Codigo</th> 
                <th>Auxiliar</th> 
                <th>Descripcion</th>                
                <th>Estado</th>
                
            </tr>
        </thead>
        <tbody>            
            <?php foreach ($data_table_activos as $row) { ?>
                <tr>                    
                    <td><?php echo $row->codigo; ?></td>
                    <td><?php echo $row->auxdesc; ?></td>                                                      
                    <td><?php echo $row->descripcion; ?></td>                  
                    <td><?php echo $row->descestado; ?></td>    
                      
                </tr>
                <?php 
            } ?>
        </tbody>
    </table>
    <p>

    </p><p></p>



    <table width="100%">
        <tr>
            <td align="justify" style="width: 100%;">
                Para ser liberado de la responsabilidad, el funcionario deberá devolver a la unidad responsable de activos fijos, el o los bienes que estaban a su cargo, debiendo recabar la conformidad escrita de esta unidad o responsable. Mientras no lo haga, estará sujeto al régimen de responsabilidad establecida en la ley Nº 1178 y sus reglamentos.
                <p></p>
           <br>
                En señal de conformidad y aceptación se firma la presente acta.
        </td>
       
    </tr>
</table>
    
    <br><br><br><br><br><br>
    <table width="100%">        
        <tbody>
        <tr>
            <td align="center" style="width: 50%;">
                    .........................................................<p></p>      
                    Efraín Soliz Mendoza<p></p>                
                    Auxiliar Contable<p></p>      
              
              
            </td>
            <td align="center" style="width: 50%;">    
                    .........................................................<p></p> 
                    Stefania Cordero Maydana:  <p></p>      <p></p>      <p></p>
                    Funcionario<p></p>      
            
            </td>           
        </tr>
        <tr>
            <td></td>
            <td></td>          
        </tr>
        <tr>
            <td></td>
            <td></td>         
        </tr>
        </tbody>     
    </table>

    <table width="100%">
        <tr>            
            <td align="right" style="width: 100%;">
               
               <img src="d:/qr.png" alt="Logo" width="96" class="logo"/>
            </td>
            
        </tr>

    </table>
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