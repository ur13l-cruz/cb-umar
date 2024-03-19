<?php

namespace App\Controllers;

class ColeccionBiologicaController extends BaseController
{
    public function index(): string
    {
        return view('coleccion_biologica');
    }
    public function getEspecies(): string
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT id,dtaxonomicos_nombre_comun, dtaxonomicos_especie FROM tbl_especimenes');
        $result = $query->getResult();
        return view('cb_dinamica', ['especies' => $result]);
    }
    public function getEspecieVista1($id): string
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM vista_1 WHERE id='.$id.';');
        /*$fields = $db->getFieldNames('vista_1');
        echo var_dump($fields);*/
        
        
        $result = $query->getResult();
        return view('vista_1', ['especie' => $result[0]]);
    }
    public function getEspecieVista2($id): string
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM vista_2 WHERE id='.$id.';');
        $result = $query->getResult();
        return view('vista_2', ['especie' => $result[0]]);
    }
    public function getEspecieVista3($id): string
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM vista_3 WHERE id='.$id.';');
        $result = $query->getResult();
        return view('vista_3', ['especie' => $result]);
    } 
    public function getEspecieVista4($id): string
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM vista_4 WHERE id='.$id.';');
        $result = $query->getResult();
        return view('vista_4', ['especie' => $result]);
    }
}
