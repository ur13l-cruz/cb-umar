<?php

namespace App\Controllers;

class ColeccionBiologicaController extends BaseController
{
    /**
     * Método index
     *
     * Este método devuelve la vista 'coleccion_biologica'.
     *
     * @return string La vista 'coleccion_biologica'
     */
    public function index(): string
    {
        return view('coleccion_biologica');
    }
    /**
     * Obtiene las especies de la colección biológica.
     *
     * @return string La vista 'cb_dinamica' con las especies obtenidas.
     */
    public function getEspecies(): string
    {
        //Conexión a la base de datos.
        $db = \Config\Database::connect();
        //Consulta a la base de datos.
        $query = $db->query('SELECT id,dtaxonomicos_nombre_comun, dtaxonomicos_genero, dtaxonomicos_especie, consulta_restrigida FROM tbl_especimenes');
        //Obtiene el resultado de la consulta.
        $result = $query->getResult();
        //Devuelve la vista 'cb_dinamica' con las especies obtenidas.
        return view('cb_dinamica', ['especies' => $result]);
    }
    public function getEspecieVista1($id): string
    {
        //Conexión a la base de datos.
        $db = \Config\Database::connect();
        //Consulta a la base de datos.
        $query = $db->query('SELECT * FROM vista_1 WHERE id=' . $id . ';');
        //Obtiene el resultado de la consulta.
        $result = $query->getResult();
        //Devuelve la vista 'vista_1' con la especie obtenida.
        return view('vista_1', ['especie' => $result[0]]);
    }
    public function getEspecieVista2($id): string
    {
        //Conexión a la base de datos.
        $db = \Config\Database::connect();
        //Consulta a la base de datos.
        $query = $db->query('SELECT * FROM vista_2 WHERE id=' . $id . ';');
        //Obtiene el resultado de la consulta.
        $result = $query->getResult();
        //Devuelve la vista 'vista_2' con la especie obtenida.
        return view('vista_2', ['especie' => $result[0]]);
    }
    public function getEspecieVista3($id): string
    {
        //Conexión a la base de datos.
        $db = \Config\Database::connect();
        //Consulta a la base de datos.
        $query = $db->query('SELECT * FROM vista_3 WHERE id=' . $id . ';');
        //Obtiene el resultado de la consulta.
        $result = $query->getResult();
        //Devuelve la vista 'vista_3' con la especie obtenida.
        return view('vista_3', ['especie' => $result[0]]);
    }
    public function getEspecieVista4($id): string
    {
        //Conexión a la base de datos.
        $db = \Config\Database::connect();
        //Consulta a la base de datos.
        $query = $db->query('SELECT * FROM vista_4 WHERE id=' . $id . ';');
        //Obtiene el resultado de la consulta.
        $result = $query->getResult();
        //Devuelve la vista 'vista_4' con la especie obtenida.
        return view('vista_4', ['especie' => $result[0]]);
    }
}
