<?php

use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\CursoPrecio;
use App\Models\CompetenciaCurso;
use App\Models\CursoTematica;
use App\Models\CursoModalidad;
use App\Models\CursoRequisito;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Realiza insert a la tabla, esto sirve para cuando se esta creando la base de datos desde cero
        Curso::create([
            'NombreCurso'=>'Programando en Java',
            'Image_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Con este curso el estudiante podra realizar un sinnumero de estudios',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
            'categoria_id'=>'1'
            
        ]);

        CursoPrecio::create(['curso_id'=>'1','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'1','Competencia'=>'Prodra lalaa hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'1','Competencia'=>'Prodra luego hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'1','Competencia'=>'Prodra priemro blablabla']);
        CompetenciaCurso::create(['curso_id'=>'1','Competencia'=>'Prodra lo que sea primero']);

        CursoTematica::create(['curso_id'=>'1','Tematica'=>'Creando','Duracion'=>'15']);
        CursoTematica::create(['curso_id'=>'1','Tematica'=>'Introduccion','Duracion'=>'17']);
        CursoTematica::create(['curso_id'=>'1','Tematica'=>'Desarrollo','Duracion'=>'135']);

        CursoModalidad::create(['curso_id'=>'1','Modalidad'=>'Diurno','Horario'=>'2pm-8pm']);
        CursoModalidad::create(['curso_id'=>'1','Modalidad'=>'Nocturno','Horario'=>'1pm-12pm']);
        CursoModalidad::create(['curso_id'=>'1','Modalidad'=>'Sabatino','Horario'=>'11pm-6pm']);
        CursoModalidad::create(['curso_id'=>'1','Modalidad'=>'Dominical','Horario'=>'5pm-7pm']);

        CursoRequisito::create(['curso_id'=>'1','Requisito'=>'primero Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'1','Requisito'=>'primero Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'1','Requisito'=>'primero Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'1','Requisito'=>'primero Tener en cuenta las labores que se le piden']);


        Curso::create([
            'NombreCurso'=>'Programando en Python',
            'Image_URL'=>'/img/Resources/cursos/test_img_1.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Esta es una descripcion de prueba',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
            'categoria_id'=>'1'
        ]);

        CursoPrecio::create(['curso_id'=>'2','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'2','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'2','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'2','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'2','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'2','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'2','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'2','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'2','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'2','Modalidad'=>'Nocturno','Horario'=>'11pm-12pm']);
        CursoModalidad::create(['curso_id'=>'2','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'2','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'2','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'2','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'2','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'2','Requisito'=>'Tener en cuenta las labores que se le piden']);

        Curso::create([
            'NombreCurso'=>'Mestria en Laravel',
            'Image_URL'=>'/img/Resources/cursos/test_img_3.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Esta es una descripcion de prueba para el curso de laravel',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
        ]);

        CursoPrecio::create(['curso_id'=>'3','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'3','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'3','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'3','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'3','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'3','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'3','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'3','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'3','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'3','Modalidad'=>'Nocturno','Horario'=>'11pm-12pm']);
        CursoModalidad::create(['curso_id'=>'3','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'3','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'3','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'3','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'3','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'3','Requisito'=>'Tener en cuenta las labores que se le piden']);

        Curso::create([
            'NombreCurso'=>'Desarrollo Web con Angular',
            'Image_URL'=>'/img/Resources/cursos/test_img_4.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Angular, como el futuro de la web',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
             'categoria_id'=>'2'
        ]);
        
        CursoPrecio::create(['curso_id'=>'4','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'4','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'4','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'4','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'4','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'4','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'4','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'4','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'4','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'4','Modalidad'=>'Nocturno','Horario'=>'11pm-12pm']);
        CursoModalidad::create(['curso_id'=>'4','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'4','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'4','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'4','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'4','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'4','Requisito'=>'Tener en cuenta las labores que se le piden']);


        Curso::create([
            'NombreCurso'=>'Tecnicas de Pedagogia Virtual',
            'Image_URL'=>'/img/Resources/cursos/test_img_5.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Implementacion de nuevas tecnologias TIC para impartir clases',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
             'categoria_id'=>'1'
        ]);

        CursoPrecio::create(['curso_id'=>'5','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'5','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'5','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'5','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'5','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'5','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'5','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'5','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'5','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'5','Modalidad'=>'Nocturno','Horario'=>'11pm-12pm']);
        CursoModalidad::create(['curso_id'=>'5','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'5','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'5','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'5','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'5','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'5','Requisito'=>'Tener en cuenta las labores que se le piden']);

        Curso::create([
            'NombreCurso'=>'Maquinas Virtuales (VWWare Station)',
            'Image_URL'=>'/img/Resources/cursos/test_img_6.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Esta es una descripcion de prueba',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
        ]);
        
        CursoPrecio::create(['curso_id'=>'6','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'6','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'6','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'6','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'6','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'6','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'6','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'6','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'6','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'6','Modalidad'=>'Nocturno','Horario'=>'11pm-12pm']);
        CursoModalidad::create(['curso_id'=>'6','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'6','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'6','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'6','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'6','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'6','Requisito'=>'Tener en cuenta las labores que se le piden']);


        Curso::create([
            'NombreCurso'=>'Matematicas Interactivas',
            'Image_URL'=>'/img/Resources/cursos/test_img_7.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Esta es una descripcion de prueba',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
            'categoria_id'=>'1'
        ]);

        CursoPrecio::create(['curso_id'=>'7','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'7','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'7','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'7','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'7','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'7','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'7','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'7','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'7','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'7','Modalidad'=>'Nocturno','Horario'=>'11pm-12pm']);
        CursoModalidad::create(['curso_id'=>'7','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'7','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'7','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'7','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'7','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'7','Requisito'=>'Tener en cuenta las labores que se le piden']);

        Curso::create([
            'NombreCurso'=>'Redaccion tecnica',
            'Image_URL'=>'/img/Resources/cursos/test_img_8.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Esta es una descripcion de prueba',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
             'categoria_id'=>'2'
        ]);
        
        CursoPrecio::create(['curso_id'=>'8','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'8','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'8','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'8','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'8','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'8','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'8','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'8','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'8','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'8','Modalidad'=>'Nocturno','Horario'=>'11pm-12pm']);
        CursoModalidad::create(['curso_id'=>'8','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'8','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'8','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'8','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'8','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'8','Requisito'=>'Tener en cuenta las labores que se le piden']);


        Curso::create([
            'NombreCurso'=>'Diseños arquitectonicos',
            'Image_URL'=>'/img/Resources/cursos/test_img_9.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Esta es una descripcion de prueba',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
            'categoria_id'=>'2'
        ]);

        CursoPrecio::create(['curso_id'=>'9','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'9','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'9','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'9','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'9','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'9','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'9','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'9','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'9','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'9','Modalidad'=>'Nocturno','Horario'=>'11pm-12pm']);
        CursoModalidad::create(['curso_id'=>'9','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'9','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'9','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'9','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'9','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'9','Requisito'=>'Tener en cuenta las labores que se le piden']);

        Curso::create([
            'NombreCurso'=>'Diseños',
            'Image_URL'=>'/img/Resources/cursos/test_img_6.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Esta es una descripcion de prueba',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
            'categoria_id'=>'1'
        ]);

        CursoPrecio::create(['curso_id'=>'10','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'10','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'10','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'10','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'10','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'10','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'10','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'10','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'10','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'10','Modalidad'=>'Nocturno','Horario'=>'11pm-12pm']);
        CursoModalidad::create(['curso_id'=>'10','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'10','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'10','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'10','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'10','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'10','Requisito'=>'Tener en cuenta las labores que se le piden']);

        Curso::create([
            'NombreCurso'=>'Diseños Prueba',
            'Image_URL'=>'/img/Resources/cursos/test_img_3.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Esta es una descripcion de prueba',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
            'categoria_id'=>'1'
        ]);

        CursoPrecio::create(['curso_id'=>'11','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'11','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'11','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'11','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'11','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'11','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'11','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'11','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'11','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'11','Modalidad'=>'Nocturno','Horario'=>'11pm-12pm']);
        CursoModalidad::create(['curso_id'=>'11','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'11','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'11','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'11','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'11','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'11','Requisito'=>'Tener en cuenta las labores que se le piden']);

        Curso::create([
            'NombreCurso'=>'Diseños 2',
            'Image_URL'=>'/img/Resources/cursos/test_img_1.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Esta es una descripcion de prueba',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
            'categoria_id'=>'1'
        ]);

        CursoPrecio::create(['curso_id'=>'12','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'12','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'12','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'12','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'12','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'12','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'12','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'12','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'12','Modalidad'=>'Diurno','Horario'=>'1pm-8pm']);
        CursoModalidad::create(['curso_id'=>'12','Modalidad'=>'Nocturno','Horario'=>'1pm-1pm']);
        CursoModalidad::create(['curso_id'=>'12','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'12','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'12','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'12','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'12','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'12','Requisito'=>'Tener en cuenta las labores que se le piden']);

        Curso::create([
            'NombreCurso'=>'Diseños 1',
            'Image_URL'=>'/img/Resources/cursos/test_img_5.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Esta es una descripcion de prueba',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
            'categoria_id'=>'1'
        ]);

        CursoPrecio::create(['curso_id'=>'13','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'13','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'13','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'13','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'13','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'13','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'13','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'13','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'13','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'13','Modalidad'=>'Nocturno','Horario'=>'13pm-12pm']);
        CursoModalidad::create(['curso_id'=>'13','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'13','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'13','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'13','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'13','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'13','Requisito'=>'Tener en cuenta las labores que se le piden']);

        Curso::create([
            'NombreCurso'=>'arquitectonicos',
            'Image_URL'=>'/img/Resources/cursos/test_img_2.png',
            'Temario_URL'=>'/img/Resources/cursos/test_img_0.png',
            'Desc_Publicidad'=>'Esta es una descripcion de prueba',
            'Desc_Introduccion'=>'Esta es la introduccion larga del curso, en donde se deberan especificar los elementos mas esenciales que se aprenderan, ademas debera ser un complemento para la introduccion publicitaria',
            'InfoAdicional'=>'Esta es la informacion adicional, se pondra algun parrafo con informacion a destacar, pueden ser avisso o algo por el estilo',
            'categoria_id'=>'1'
        ]);

        CursoPrecio::create(['curso_id'=>'14','Precio'=>'10.2']);

        CompetenciaCurso::create(['curso_id'=>'14','Competencia'=>'Prodra hacer una cosa']);
        CompetenciaCurso::create(['curso_id'=>'14','Competencia'=>'Prodra hacer otra cosa']);
        CompetenciaCurso::create(['curso_id'=>'14','Competencia'=>'Prodra blablabla']);
        CompetenciaCurso::create(['curso_id'=>'14','Competencia'=>'Prodra lo que sea']);

        CursoTematica::create(['curso_id'=>'14','Tematica'=>'Creando','Duracion'=>'5']);
        CursoTematica::create(['curso_id'=>'14','Tematica'=>'Introduccion','Duracion'=>'7']);
        CursoTematica::create(['curso_id'=>'14','Tematica'=>'Desarrollo','Duracion'=>'15']);

        CursoModalidad::create(['curso_id'=>'14','Modalidad'=>'Diurno','Horario'=>'12pm-8pm']);
        CursoModalidad::create(['curso_id'=>'14','Modalidad'=>'Nocturno','Horario'=>'14pm-12pm']);
        CursoModalidad::create(['curso_id'=>'14','Modalidad'=>'Sabatino','Horario'=>'1pm-6pm']);
        CursoModalidad::create(['curso_id'=>'14','Modalidad'=>'Dominical','Horario'=>'3pm-7pm']);

        CursoRequisito::create(['curso_id'=>'14','Requisito'=>'Tener toda la documentacion']);
        CursoRequisito::create(['curso_id'=>'14','Requisito'=>'Buscar todas las cosas que se le piden']);
        CursoRequisito::create(['curso_id'=>'14','Requisito'=>'Informar de cualquier cosa con el superior']);
        CursoRequisito::create(['curso_id'=>'14','Requisito'=>'Tener en cuenta las labores que se le piden']);
}
}
