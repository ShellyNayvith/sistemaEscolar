<?php

namespace app\models;

use Yii;
use app\models\TuArchivoestudiante;

class UploadFileForm extends Model
{
    public $file;
    public $fileA;

    public function rules()
    {
        return [
            [['file'], 'file'],
            [['fileA'], 'file'],
        ];
    }

    public function upload($user = null, $solicitud = null)
    {
        if (isset($user) && isset($solicitud)) {
            if ($this->validate()) {
                $ruta     = 'uploads/' . $solicitud;
                //$filename = Yii::$app->security->generateRandomString() . '.' . $this->file->extension;
                $filename = $this->file->name;
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }
                if ($this->file->saveAs($ruta . '/' . $filename)) {
                    $archivo = new Archivo();
                    $archivo->arc_nombre         = $this->file->name;
                    $archivo->arc_tipo           = $this->file->type;
                    $archivo->arc_tamano         = $this->file->size;
                    $archivo->arc_createdat      = time();
                    $archivo->arc_updatedat      = time();
                    $archivo->arc_ruta           = "/{$ruta}/{$filename}";
                    $archivo->arc_fkuser         = $user;
                    $archivo->arc_nombretemporal = $filename;
                    if ($archivo->save()) {
                        return $archivo->id;
                    }
                    return 'No se guardo el archivo';
                } else {
                    return $this->errors;
                }
            } else {
                return "No existe el usuario";
            }
        }
    }

    public function uploadEstudiante($user = null)
    {
        if (isset($user)) {
            //if ($this->validate()) {
                //$filename = Yii::$app->security->generateRandomString() . '.' . $this->file->extension;
                    $filename = $this->file->name;
                    /* $ruta     = 'uploads/bdestudiante';
                    if (!file_exists($ruta)) {
                        mkdir($ruta, 0777, true);
                    } */
                
                   /*  $archivo = new TuArchivoestudiante();
                    $archivo->nombre         = $this->file->name;
                    $archivo->tipo           = $this->file->type;
                    $archivo->tamano         = $this->file->size;
                    $archivo->createdat      = time();
                    $archivo->updatedat      = time();
                    $archivo->ruta           = "/{$ruta}/{$filename}";
                    $archivo->fkuser         = $user;
                    $archivo->nombretemporal = $filename;
                    if ($archivo->save()) {
                       
                        if ($this->file->saveAs($ruta . '/' . $filename)) {
                            return true;
                        } else {
                            return false;
                        }
                    }else{
                        return false;
                    } */
                   return $filename;
               
           // } else {
           //     return false;
           // }
        }
    }


    //sube los archivos de los libros
    public function uploadCinco($user = null, $libro = null)
    {
        if (isset($user) && isset($libro)) {
            //ruta para subir el archivo fisico
            $rutaGuarda = Yii::getAlias('@frontend/web/') . 'uploads/libros/' . $libro;
            //ruta para guardar en la base de datos
            $ruta     = 'uploads/libros/' . $libro;
            //si la carpeta no existe se crea
            if (!file_exists($rutaGuarda)) {
                mkdir($rutaGuarda, 0777, true);
            }
            $cuenta = 0;
            $contador = 0;
            //consulta todos los archivos
            foreach ($this->file as $f) {
                $cuenta = $cuenta + 1;
                //$filename = Yii::$app->security->generateRandomString() . '.' . $f->extension;
                $filename = $f->name;
                //si se sube fisicamente el archivo entonces se graba en la tabla archivos libro
                if ($f->saveAs($rutaGuarda . '/' . $filename)) {
                    //se almacena los datos en la tabla archivos libro
                    $archivo = new Archivolibro();
                    $archivo->arc_nombre         = $f->name;
                    $archivo->arc_tipo           = $f->type;
                    $archivo->arc_tamano         = $f->size;
                    $archivo->arc_createdat      = time();
                    $archivo->arc_updatedat      = time();
                    $archivo->arc_ruta           = "/{$ruta}/{$filename}";
                    $archivo->arc_fkuser         = $user;
                    $archivo->arc_nombretemporal = $filename;
                    $archivo->save();
                    //se almacenan los datos en la tabla libroarchivo
                    $libroarchivo = new Libroarchivo();
                    $libroarchivo->lia_fklibro = $libro;
                    $libroarchivo->lia_fkarchivo = $archivo->id;
                    $libroarchivo->lia_like = 0;
                    $libroarchivo->lia_descripcion = $archivo->arc_nombre;
                    $libroarchivo->save();
                    $contador = $contador + 1;
                }
            }
            //se grabaron todos los archivos seleccionados
            if ($cuenta == $contador) {
                return true;
            } else {
                return false;
            }
        }
    }

    //sube la imagen de los libros
    public function uploadCuatro($user = null, $libro = null)
    {
        if (isset($user) && isset($libro)) {
            //ruta para subir el archivo fisico
            $rutaGuarda = Yii::getAlias('@frontend/web/') . 'uploads/libros/' . $libro;
            //ruta para guardar en la base de datos
            $ruta     = 'uploads/libros/' . $libro;
            //si la carpeta no existe se crea
            if (!file_exists($rutaGuarda)) {
                mkdir($rutaGuarda, 0777, true);
            }
            $cuenta = 0;
            $contador = 0;
            //consulta todos los archivos
            foreach ($this->file as $f) {
                $cuenta = $cuenta + 1;
                //$filename = Yii::$app->security->generateRandomString() . '.' . $f->extension;
                $filename = $f->name;
                //si se sube fisicamente el archivo entonces se graba en la tabla archivos libro
                if ($f->saveAs($rutaGuarda . '/' . $filename)) {
                    //se almacena los datos en la tabla archivos libro
                    $archivo = new Archivolibro();
                    $archivo->arc_nombre         = $f->name;
                    $archivo->arc_tipo           = $f->type;
                    $archivo->arc_tamano         = $f->size;
                    $archivo->arc_createdat      = time();
                    $archivo->arc_updatedat      = time();
                    $archivo->arc_ruta           = "/{$ruta}/{$filename}";
                    $archivo->arc_fkuser         = $user;
                    $archivo->arc_nombretemporal = $filename;
                    $archivo->save();
                    //se almacenan los datos en la tabla libroarchivo
                    $libroarchivo = new Libroarchivo();
                    $libroarchivo->lia_fklibro = $libro;
                    $libroarchivo->lia_fkarchivo = $archivo->id;
                    $libroarchivo->lia_like = 0;
                    $libroarchivo->lia_descripcion = $archivo->arc_nombre;
                    $libroarchivo->save();
                    $contador = $contador + 1;
                }
            }
            //se grabaron todos los archivos seleccionados
            if ($cuenta == $contador) {
                return true;
            } else {
                return false;
            }
        }
    }

        //sube la imagen de los slider
        public function uploadTres($user = null, $nombre = null)
        {
            if (isset($user) && isset($nombre)){
                if ($this->validate()) {
                //ruta para subir el archivo fisico
                $rutaGuarda = Yii::getAlias('@frontend/web/') . 'uploads/certificadocumentos/';
                $ruta     = 'uploads/certificadocumentos';
                $filename = $this->file->name;
                //si la carpeta no existe se crea
                if (!file_exists($rutaGuarda)) {
                    mkdir($rutaGuarda, 0777, true);
                }
                //si se sube fisicamente el archivo
                if ($this->file->saveAs($rutaGuarda . '/' . $filename)) {
                    $archivo1 = new Archivocertificadocumento();
                    $archivo1->arc_nombre         = $this->file->name;
                    $archivo1->arc_tipo           = $this->file->type;
                    $archivo1->arc_tamano         = $this->file->size;
                    $archivo1->arc_createdat      = time();
                    $archivo1->arc_updatedat      = time();
                    $archivo1->arc_ruta           = "/{$ruta}/{$filename}";
                    $archivo1->arc_fkuser         = $user;
                    $archivo1->arc_nombretemporal = $filename;
                    if ($archivo1->save()) {
                        return $archivo1->id;
                    }
                    return 'No se guardo el archivo';
                } else {
                    return $this->errors;
                }

            } else {
                return "No existe el usuario";
            }
            }
        }

    public function uploadUno($user = null, $nota = null)
    {
        if (isset($user) && isset($nota)) {
            //ruta para subir el archivo fisico
            $rutaGuarda = Yii::getAlias('@frontend/web/') . 'uploads/notas/' . $nota;
            //ruta para guardar en la base de datos
            $ruta     = 'uploads/notas/' . $nota;
            //si la carpeta no existe se crea
            if (!file_exists($rutaGuarda)) {
                mkdir($rutaGuarda, 0777, true);
            }
            $cuenta = 0;
            $contador = 0;
            //consulta todos los archivos
            foreach ($this->file as $f) {
                $cuenta = $cuenta + 1;
                //$filename = Yii::$app->security->generateRandomString() . '.' . $f->extension;
                $filename = $f->name;
                //si se sube fisicamente el archivo entonces se graba en la tabla archivos
                if ($f->saveAs($rutaGuarda . '/' . $filename)) {
                    //se almacena los datos en la tabla archivos
                    $archivo = new Archivonota();
                    $archivo->arc_nombre         = $f->name;
                    $archivo->arc_tipo           = $f->type;
                    $archivo->arc_tamano         = $f->size;
                    $archivo->arc_createdat      = time();
                    $archivo->arc_updatedat      = time();
                    $archivo->arc_ruta           = "/{$ruta}/{$filename}";
                    $archivo->arc_fkuser         = $user;
                    $archivo->arc_nombretemporal = $filename;
                    $archivo->save();
                    //se almacenan los datos en la tabla notaarchivo
                    $notaarchivo = new Notaarchivo();
                    $notaarchivo->nta_fknota = $nota;
                    $notaarchivo->nta_fkarchivo = $archivo->id;
                    $notaarchivo->nta_like = 0;
                    $notaarchivo->nta_descripcion = $archivo->arc_nombre;
                    $notaarchivo->save();
                    $contador = $contador + 1;
                }
            }
            //se grabaron todos los archivos seleccionados
            if ($cuenta == $contador) {
                return true;
            } else {
                return false;
            }
        }
    }

    //subida de archivos de avisos
    public function uploadDos($user = null, $aviso = null)
    {
        if (isset($user) && isset($aviso)) {
            //ruta para subir el archivo fisico
            $rutaGuarda = Yii::getAlias('@frontend/web/') . 'uploads/avisos/' . $aviso;
            //ruta para guardar en la base de datos
            $ruta     = 'uploads/avisos/' . $aviso;
            //si la carpeta no existe se crea
            if (!file_exists($rutaGuarda)) {
                mkdir($rutaGuarda, 0777, true);
            }
            $cuenta = 0;
            $contador = 0;
            //consulta todos los archivos
            foreach ($this->file as $f) {
                $cuenta = $cuenta + 1;
                //$filename = Yii::$app->security->generateRandomString() . '.' . $f->extension;
                $filename = $f->name;
                //si se sube fisicamente el archivo entonces se graba en la tabla archivos
                if ($f->saveAs($rutaGuarda . '/' . $filename)) {
                    //se almacena los datos en la tabla archivos
                    $archivo = new Archivoaviso();
                    $archivo->arc_nombre         = $f->name;
                    $archivo->arc_tipo           = $f->type;
                    $archivo->arc_tamano         = $f->size;
                    $archivo->arc_createdat      = time();
                    $archivo->arc_updatedat      = time();
                    $archivo->arc_ruta           = "/{$ruta}/{$filename}";
                    $archivo->arc_fkuser         = $user;
                    $archivo->arc_nombretemporal = $filename;
                    $archivo->save();
                    //se almacenan los datos en la tabla notaarchivo
                    $avisoarchivo = new Avisoarchivo();
                    $avisoarchivo->ava_fkaviso = $aviso;
                    $avisoarchivo->ava_fkarchivo = $archivo->id;
                    $avisoarchivo->ava_like = 0;
                    $avisoarchivo->ava_descripcion = $archivo->arc_nombre;
                    $avisoarchivo->save();
                    $contador = $contador + 1;
                }
            }
            //se grabaron todos los archivos seleccionados
            if ($cuenta == $contador) {
                return true;
            } else {
                return false;
            }
        }
    }

    //retorno nombre de imagen de fotoportada
    public function getNombre()
    {
        //$filename = Yii::$app->security->generateRandomString() . '.' . $this->file->extension;
        $filename = $this->file->name;
        return $filename;
    }
    //sube la imagen de portada de las notas
    public function uploadImage($user = null, $nota = null, $nombre = null)
    {
        if (isset($user) && isset($nota) && isset($nombre)) {
            //ruta para subir el archivo fisico
            $rutaGuarda = Yii::getAlias('@frontend/web/') . 'uploads/notas/' . $nota;
            //ruta para guardar en la base de datos
            $ruta     = 'uploads/notas/' . $nota;
            //si la carpeta no existe se crea
            if (!file_exists($rutaGuarda)) {
                mkdir($rutaGuarda, 0777, true);
            }
            //si se sube fisicamente el archivo entonces se graba en la tabla archivos
            if ($this->file->saveAs($rutaGuarda . '/' . $nombre)) {
                return true;
            } else {
                return false;
            }
        }
    }

    //sube la imagen de portada de las avisos
    public function uploadImageAviso($user = null, $aviso = null, $nombre = null)
    {
        if (isset($user) && isset($aviso) && isset($nombre)) {
            //ruta para subir el archivo fisico
            $rutaGuarda = Yii::getAlias('@frontend/web/') . 'uploads/avisos/' . $aviso;
            //ruta para guardar en la base de datos
            $ruta     = 'uploads/avisos/' . $aviso;
            //si la carpeta no existe se crea
            if (!file_exists($rutaGuarda)) {
                mkdir($rutaGuarda, 0777, true);
            }
            //si se sube fisicamente el archivo entonces se graba en la tabla archivos
            if ($this->file->saveAs($rutaGuarda . '/' . $nombre)) {
                return true;
            } else {
                return false;
            }
        }
    }

    //sube la imagen de los cursos
    public function uploadImageCurso($user = null, $curso = null, $nombre = null)
    {
        if (isset($user) && isset($curso) && isset($nombre)) {
            //ruta para subir el archivo fisico
            $rutaGuarda = Yii::getAlias('@frontend/web/') . 'uploads/cursos/' . $curso;
            //ruta para guardar en la base de datos
            $ruta     = 'uploads/cursos/' . $curso;
            //si la carpeta no existe se crea
            if (!file_exists($rutaGuarda)) {
                mkdir($rutaGuarda, 0777, true);
            }
            //si se sube fisicamente el archivo entonces se graba en la tabla archivos
            if ($this->file->saveAs($rutaGuarda . '/' . $nombre)) {
                return true;
            } else {
                return false;
            }
        }
    }

    //sube la imagen de los slider
    public function uploadImageSlider($nombre = null)
    {
        if (isset($nombre)) {
            //ruta para subir el archivo fisico
            $rutaGuarda = Yii::getAlias('@frontend/web/') . 'uploads/slider/';
            //si la carpeta no existe se crea
            if (!file_exists($rutaGuarda)) {
                mkdir($rutaGuarda, 0777, true);
            }
            //si se sube fisicamente el archivo
            if ($this->file->saveAs($rutaGuarda . '/' . $nombre)) {
                return true;
            } else {
                return false;
            }
        }
    }

    //sube la imagen de portada de los libros
    public function uploadImageLibro($user = null, $libro = null, $nombre = null)
    {
        if (isset($user) && isset($libro) && isset($nombre)) {
            //ruta para subir el archivo fisico
            $rutaGuarda = Yii::getAlias('@frontend/web/') . 'uploads/libros/' . $libro;
            //ruta para guardar en la base de datos
            $ruta     = 'uploads/libros/' . $libro;
            //si la carpeta no existe se crea
            if (!file_exists($rutaGuarda)) {
                mkdir($rutaGuarda, 0777, true);
            }
            //si se sube fisicamente el archivo entonces se graba en la tabla archivos
            if ($this->file->saveAs($rutaGuarda . '/' . $nombre)) {
                return true;
            } else {
                return false;
            }
        }
    }

}
