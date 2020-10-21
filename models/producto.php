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

    public function conseguirTodos()
    {
        $sql = "SELECT productos.*, GROUP_CONCAT(tamano) AS tallas FROM productos LEFT JOIN tallas_productos ON productos.id=tallas_productos.producto_id LEFT JOIN tallas ON tallas.id=tallas_productos.talla_id GROUP BY productos.id ORDER BY productos.id ASC";
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

    public function save()
    {
        $sql = "INSERT INTO productos VALUES (NULL, '{$this->getNombre()}','{$this->getDescripcion()}','{$this->getPrecio()}','{$this->getStock()}','{$this->getOferta()}', CURDATE() ,'{$this->getCategoria_id()}')";
        $save = $this->db->query($sql);

        return $save;
    }
}