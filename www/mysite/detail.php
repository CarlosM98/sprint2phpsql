<?php
        $db = mysqli_connect('localhost', 'root', '1234',  'mysitedb')or die('Fail');
        if(!$db){
                die('Error de conexión:' .mysqli_connect_error());
        }
        echo 'Conexion exitosa';
?>
<!DOCTYPE>
<html>
        <head>
                <style>
                        img{
                                width: 150px;
                                height: 150px;
                        }
                        a{ text-decoration: none;}
                </style>
        </head>
        <body>
                <?php
                 if(!isset($_GET['libro_id'])){
                        die('No se ha especificado una canción.');
                 }
                 $libro_id = $_GET['libro_id'];
                 $query = 'select * from tLibros where id ='.$libro_id;
                 $resultado = mysqli_query($db, $query) or die('Queryerror');
                 $only_row = mysqli_fetch_array($resultado);
                 echo '<h1>'.$only_row['nombre'].'</h1>';
                 echo '<p>'.$only_row['autor'].'</p>';
                 echo '<p>'.$only_row['anho_publicacion'].'</p>';
                 echo '<img src="'.$only_row['url_imagen']. '"alt="Imagen libro">';
                 echo '<hr>';
                 ?>
                 <h2>Comentarios</h2>

                 <ul>
                        <?php
                        $query2 = 'select * from tComentarios where id ='.$libro_id;
                        $resultado2 =  mysqli_query($db, $query2) or die('Query error');
                        echo 'Numero de filas: '.mysqli_num_rows($resultado2).'<br>';
                        while($row = mysqli_fetch_array($resultado2)){
                        echo '<li>'.$row['comentario'].'</li>';

                        }
                        mysqli_close($db);
                        ?>
                 </ul>
        </body>
</html>
