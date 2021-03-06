<?php session_start();       
    if(!$_SESSION['username'] || $_SESSION['tipoUsuario']!=1) header("Location:../index.php");
    $subCarp="../";
    require_once '../head.php';
    echo "<body>";
    require_once 'header-cliente.php';
?>
    <main class="principal">
        <div class="d-flex align-items-center justify-content-around">
            <hr class="linea-izq">
            <p class="titulos-espacios">Ingresa tu producto</p>
            <hr class="linea-der">
        </div>

        <?php    
            $categorias=array("Vehículos","Tecnología","Electrodomésticos","Hogar y muebles","Moda y complementos" ,"Deportes y fitness","Herramientas y construcción" ,"Industria y oficina","Juegos y juguetes" ,"Bebés","Salud y belleza" ,"Arte y antigüedades" ,"Libros y comics","Coleccionables","Otros");
            $id=intval($_SESSION['id']);

            echo "
            <div class='d-flex  flex-column  align-items-center justify-content-around '>";
                if(isset($_GET['u'])){
                    $id_p=$_GET['id_p'];
                    echo "<form enctype='multipart/form-data' action='actualiza.php?u=0&id_p=$id_p' class='modificar-productos-contenedor' method='POST'>";
                }else{
                    echo "<form enctype='multipart/form-data' action='actualiza.php' class='modificar-productos-contenedor' method='POST'>";
                }    
                    echo "<div class='cards-modificar-producto-big card-borde d-flex flex-column'>
                        <h3 class='modificar-producto-titulo'>Información general</h3>
                            <label for='select' class='modificar-producto-titulo-label' >Categoría <span>*</span></label> ";
                echo"<select class='form-select modificar-producto-select modificar-producto-titulo-label' name='categoria' required>";
                foreach ($categorias as &$valor) {
                    echo"<option class='modificar-producto-titulo-label' value=$valor>$valor</option>";
                    
                }
                echo "</select>";
                echo "   <label class='modificar-producto-titulo-label' >Título (máx 30 carácteres):<span>*</span></label> 
                            <INPUT TYPE='text' maxlength='30' NAME='nombre' class='form-control  modificar-producto-select modificar-producto-titulo-label ' required> 
                        <label class='modificar-producto-titulo-label' >Descripción del producto:<span>*</span></label> 
                            <TEXTAREA class='modificar-producto-textarea modificar-producto-titulo-label form-control' maxlength='500' NAME='descripcion' required></TEXTAREA>
                    </div>
                
                    <div class='cards-modificar-producto-small card-borde d-flex flex-column'>

                        <h3 class='modificar-producto-titulo'>qué te gustaría a cambio?</h3>
                        <label class='modificar-producto-titulo-label' >Título:<span>*</span></label> 
                            <INPUT TYPE='text' maxlength='30' NAME='titulo_cambio' class='form-control  modificar-producto-select modificar-producto-titulo-label ' required>
                        <label class='modificar-producto-titulo-label' >Descripción:<span>*</span></label> 
                            <TEXTAREA class='modificar-producto-textarea modificar-producto-titulo-label form-control' maxlength='300' NAME='descripcion_cambio' required></TEXTAREA>
                            
                    </div>";
                
                echo "              
                        <div class='cards-modificar-producto-big card-borde d-flex flex-column'>
                            <h3 class='modificar-producto-titulo'>Imágenes</h3>
                            <script src='https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js'></script>
                            <label for='cargar-img' class='label-img-producto-individual'>
                                <lord-icon
                                    src='https://cdn.lordicon.com/fgkmrslx.json'
                                    trigger='loop'
                                    colors='primary:#4a8aa1,secondary:#c60f7b'
                                    class='label-img-producto-individual-icon'>
                                </lord-icon>
                                <p class='modificar-producto-titulo-label'>Añadir imagenes <span>*</span></p>
                            </label>
                            <input id='cargar-img' onchange='subirimg()' name='image[]' multiple='' type='file' accept='image/*' required/>
                            <div id='img-cargadas'></div>
                        </div>
                        <div class='cards-modificar-producto-small card-borde d-flex flex-column'>
                            <h3 class='modificar-producto-titulo'>ubicación del intercambio</h3>
                            <label class='modificar-producto-titulo-label' >Estado:<span>*</span></label> 
                                <INPUT TYPE='text' maxlength='20' NAME='estado'  class='form-control  modificar-producto-select modificar-producto-titulo-label ' required>
                            <label class='modificar-producto-titulo-label' > Municipio:<span>*</span></label> 
                                <INPUT TYPE='text' maxlength='20' NAME='municipio'   class='form-control  modificar-producto-select modificar-producto-titulo-label ' required>
                            <label class='modificar-producto-titulo-label' >Calle y número:<span>*</span></label> 
                                <INPUT TYPE='text' maxlength='50' NAME='calle' class='form-control  modificar-producto-select modificar-producto-titulo-label ' required>
                            <label class='modificar-producto-titulo-label' >Referencias:<span>*</span></label>  
                                <TEXTAREA class='modificar-producto-textarea modificar-producto-titulo-label form-control' maxlength='150' NAME='referencia' required></TEXTAREA>
                        </div>";
                echo "<input type='hidden' name='id_user' value='$id'>";
                echo "<INPUT TYPE='SUBMIT' class='modificar-productos-boton card-borde' value='Publicar producto'>";
            echo "</form>";
        ?>

    </main>

<?php          
    require_once '../footer.php';
?>
<script>
    
function subirimg(){
    let cargar = ''
    let imNames= document.getElementById('cargar-img').files
    for (const file in imNames) 
        if(imNames[file].name) 
            if(imNames[file].name !='item')
                cargar=cargar+'<p class="card-titulo">'+imNames[file].name+'</p>'
    document.getElementById('img-cargadas').innerHTML = cargar
    console.log(imNames);
}
</script>

</body>

</html>