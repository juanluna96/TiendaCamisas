<?php

class producto
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $categoria_id;
    private $talla_id;
    private $color_id;
    private $imagen1;
    private $imagen2;
    private $imagen3;
    private $imagen4;
    private $imagen5;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);

        return $this;
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }

    /**
     * Get the value of oferta
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set the value of oferta
     *
     * @return  self
     */
    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $this->db->real_escape_string($fecha);

        return $this;
    }

    /**
     * Get the value of categoria_id
     */
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);

        return $this;
    }

    /**
     * Get the value of talla_id
     */
    public function getTalla_id()
    {
        return $this->talla_id;
    }

    /**
     * Set the value of talla_id
     *
     * @return  self
     */
    public function setTalla_id($talla_id)
    {
        $this->talla_id = $this->db->real_escape_string($talla_id);

        return $this;
    }

    /**
     * Get the value of color_id
     */
    public function getColor_id()
    {
        return $this->color_id;
    }

    /**
     * Set the value of color_id
     *
     * @return  self
     */
    public function setColor_id($color_id)
    {
        $this->color_id = $this->db->real_escape_string($color_id);

        return $this;
    }

    /**
     * Get the value of imagen1
     */
    public function getImagen1()
    {
        return $this->imagen1;
    }

    /**
     * Set the value of imagen1
     *
     * @return  self
     */
    public function setImagen1($imagen1)
    {
        $this->imagen1 = $imagen1;

        return $this;
    }

    /**
     * Get the value of imagen2
     */
    public function getImagen2()
    {
        return $this->imagen2;
    }

    /**
     * Set the value of imagen2
     *
     * @return  self
     */
    public function setImagen2($imagen2)
    {
        $this->imagen2 = $imagen2;

        return $this;
    }

    /**
     * Get the value of imagen3
     */
    public function getImagen3()
    {
        return $this->imagen3;
    }

    /**
     * Set the value of imagen3
     *
     * @return  self
     */
    public function setImagen3($imagen3)
    {
        $this->imagen3 = $imagen3;

        return $this;
    }

    /**
     * Get the value of imagen4
     */
    public function getImagen4()
    {
        return $this->imagen4;
    }

    /**
     * Set the value of imagen4
     *
     * @return  self
     */
    public function setImagen4($imagen4)
    {
        $this->imagen4 = $imagen4;

        return $this;
    }

    /**
     * Get the value of imagen5
     */
    public function getImagen5()
    {
        return $this->imagen5;
    }

    /**
     * Set the value of imagen5
     *
     * @return  self
     */
    public function setImagen5($imagen5)
    {
        $this->imagen5 = $imagen5;

        return $this;
    }

    public function conseguirTodos()
    {
        $sql = "SELECT productos.*, GROUP_CONCAT(tamano) AS tallas FROM productos LEFT JOIN tallas_productos ON productos.id=tallas_productos.producto_id LEFT JOIN tallas ON tallas.id=tallas_productos.talla_id GROUP BY productos.id ORDER BY productos.id ASC";
        $productos = $this->db->query($sql);

        return $productos;
    }

    public function conseguirUno()
    {
        $sql = "SELECT productos.*, GROUP_CONCAT(tamano) AS tallas FROM productos LEFT JOIN tallas_productos ON productos.id=tallas_productos.producto_id LEFT JOIN tallas ON tallas.id=tallas_productos.talla_id WHERE productos.id={$this->getId()} GROUP BY productos.id ORDER BY productos.id ASC";
        $productos = $this->db->query($sql);

        return $productos;
    }

    public function obtenerColores()
    {
        $productos = $this->conseguirTodos();

        $array = [];
        foreach ($productos as $producto) {
            $sql = "SELECT * FROM colores, colores_productos WHERE colores.id=colores_productos.color_id AND colores_productos.producto_id=" . $producto['id'];
            $consulta_colores = $this->db->query($sql);
            foreach ($consulta_colores as $consulta_color) {
                $array[$producto["id"]][] = $consulta_color;
            }
        }

        return $array;
    }

    public function obtenerColoresProducto()
    {
        $sql = "SELECT * FROM colores, colores_productos WHERE colores.id=colores_productos.color_id AND colores_productos.producto_id={$this->getId()}";
        $colores_producto = $this->db->query($sql);
        return $colores_producto;
    }

    public function save()
    {
        $sql = "INSERT INTO productos VALUES (NULL, '{$this->getNombre()}','{$this->getDescripcion()}','{$this->getPrecio()}','{$this->getStock()}','{$this->getOferta()}', CURDATE() ,'{$this->getCategoria_id()}')";
        $save = $this->db->query($sql);

        return $save;
    }

    public function add_talla()
    {
        $sql = "INSERT INTO tallas_productos VALUES (NULL, {$this->getTalla_id()}, {$this->getId()})";
        $save = $this->db->query($sql);

        return $save;
    }

    public function add_color()
    {
        $sql = "INSERT INTO colores_productos VALUES (NULL, {$this->getColor_id()}, {$this->getId()},'{$this->getImagen1()}','{$this->getImagen2()}','{$this->getImagen3()}','{$this->getImagen4()}','{$this->getImagen5()}')";
        $save = $this->db->query($sql);

        return $save;
    }

    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id={$this->getId()}";
        $delete = $this->db->query($sql);

        return $delete;
    }

    public function edit()
    {
        $sql = "UPDATE `productos` SET `nombre`='{$this->getNombre()}',`descripcion`='{$this->getDescripcion()}',`precio`='{$this->getPrecio()}',`stock`='{$this->getStock()}',`oferta`='{$this->getOferta()}',`fecha`=CURDATE(),`categoria_id`='{$this->getCategoria_id()}' WHERE id={$this->getId()}";
        $edit = $this->db->query($sql);

        return $edit;
    }
}
