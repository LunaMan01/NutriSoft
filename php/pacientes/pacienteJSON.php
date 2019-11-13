<?php 
    include 'conexion.php';

    $id = $_POST['id'];
    echo $id;
    try{
        // DATOS GENERALES
        $datos = "SELECT * FROM pacientes WHERE ID_PACIENTES = ".$id;

        $generales = new \stdClass();

        foreach($conn->query($datos) as $row){
            $generales->nombre = $row['Nombre_P'];
            $generales->paterno = $row['AP_P'];
            $generales->materno = $row['AM_P'];
            $generales->escolaridad = $row['Escolaridad'];
            $generales->genero = $row['Genero'];

            $diaN = $row['Dia_N'];
            $mesN = $row['Mes_N'];
            $añoN = $row['Anio_N'];
            $generales->fechaNacimiento = $diaN."/".$mesN."/".$añoN;
            
            $generales->calle = $row['Calle_P'];
            $generales->numero = $row['Num_P'];
            $generales->colonia = $row['Col_P'];
            $generales->ciudad = $row['Ciudad'];
            $generales->estado = $row['Estado'];
            $generales->telefono = $row['Telefono'];
            $generales->correo = $row['Correo'];
            $generales->historial = $row['Historial_P'];
            
            $diaC = $row['Dia_C'];
            $mesC = $row['Mes_C'];
            $añoC = $row['Anio_C'];
            $generales->fechaConsulta = $diaC."/".$mesC."/".$añoC;

            $diaSC = $row['Dia_SC'];
            $mesSC = $row['Mes_SC'];
            $añoSC = $row['Anio_SC'];
            $generales->fechaSiguienteConsulta = $diaSC."/".$mesSC."/".$añoSC;
            
            $generales->observaciones = $row['Observaciones'];
        }        

        // ESTILO DE VIDA
        $estilo = "SELECT * FROM estilo_vida WHERE ID_PACIENTES = ".$id;

        foreach($conn->query($estilo) as $row){
            $generales->laboral = $row['Act_Laboral'];
            $generales->descripcion = $row['escripcion_Act_Lab'];
            $generales->deportivas = $row['Deportes'];
            $generales->estres = $row['Estres'];
        }

        // HISTORIA CLINICA
        $historia = "SELECT * FROM historia_clinica WHERE ID_PACIENTES = ".$id;

        foreach($conn->query($historia) as $row){
            $generales->$motivo = $row['Motivo_Consulta'];
            $generales->$previa = $row['Terapeuta_Previa'];
            $generales->$cirugias = $row['Cirugias_Realizadas'];
            $generales->$sangre = $row['Tipo_Sangre'];
            $generales->$alergias = $row['Alergias'];
            $generales->$diagnostico = $row['Diagnostivo_Previo'];
            $generales->$vacunas = $row['Vacunas'];
            $generales->$antecedentes = $row['Antecedentes_Familiares'];
        }

        // ETIQUETAS DE PACIENTE
        // HABITOS TOXICOS
        $toxicos = "SELECT * FROM habitos_toxicos WHERE ID_PACIENTES = ".$id;

        foreach($conn->query($toxicos) as $row){
            $generales->fCigarro = $row['Frecuencia_Cigarro'];
            $generales->cCigarro = $row['Cantidad_Cigarro'];
            $generales->fAlcohol = $row['Frecuencia_Alcohol'];
            $generales->cAlcohol = $row['Cantidad_Alcohol'];
            $generales->fDrogas = $row['Frecuencia_Drogas'];
            $generales->cDrogas = $row['Cantidad_Drogas'];
        }
        
        // PLAN ALIMENTICIO
        $plan = "SELECT * FROM plan_alimenticio WHERE ID_PACIENTES = ".$id;

        foreach($conn->query($plan) as $row){
            $generales->plan = $row['Descripcion'];
        }

        // MEDICIONES BASICAS
        $mediciones = "SELECT * FROM mediciones_basicas WHERE ID_PACIENTES = ".$id;

        foreach($conn->query($mediciones) as $row){
            $generales->estatura = $row['Estatura'];
            $generales->peso = $row['Peso'];
            $generales->factor = $row['Factor_Act'];
            $generales->embarazo = $row['Embarazo'];
        }

        // BIOIMPEDANCIA
        $bioimpedancia = "SELECT * FROM bioimpedancia WHERE ID_PACIENTES = ".$id;

        foreach($conn->query($bioimpedancia) as $row){
            $generales->total = $row['Grasa_Total'];
            $generales->superior = $row['Grasa_Superior'];
            $generales->inferior = $row['Grasa_Inferior'];
            $generales->viseral = $row['Grasa_Viseral'];
            $generales->libre = $row['Masa_Libre_Grasa'];
            $generales->muscular = $row['Masa_Muscular'];
            $generales->oseo = $row['Peso_Oseo'];
            $generales->agua = $row['Agua_Corporal'];
            $generales->edad = $row['Edad_Metabolica'];
        }

        // PLIEGUES
        $pliegues = "SELECT * FROM pliegues WHERE ID_PACIENTES = ".$id;

        foreach($conn->query($pliegues) as $row){
            $generales->subes = $row['Subescapular'];
            $generales->tricep = $row['Triceps'];
            $generales->bicep = $row['Biceps'];
            $generales->crestal = $row['Ileocrestal'];
            $generales->supra = $row['Suprailiaco'];
            $generales->abdomianl = $row['Abdominal'];
            $generales->frontal = $row['muslo_Frontal'];
            $generales->medial = $row['Pantorrilla_Medial'];
            $generales->axiliar = $row['Axiliar_Medial'];
            $generales->pectoral = $row['Pectoral'];
        }

        // PERIMETROS
        $perimetros = "SELECT * FROM perimetros WHERE ID_PACIENTES = ".$id;

        foreach($conn->query($perimetros) as $row){
            $generales->cefalico = $row['Cefalico'];
            $generales->cuello = $row['Cuello'];
            $generales->relajado = $row['Brazo_Relajado'];
            $generales->contraido = $row['Brazo_Contraido'];
            $generales->antebrazo = $row['Antebrazo'];
            $generales->muñeca = $row['Muneca'];
            $generales->meseo = $row['Meseoesternal'];
            $generales->umbilical = $row['Umbilical'];
            $generales->cintura = $row['Cintura'];
            $generales->caderas = $row['Caderas'];
            $generales->muslo = $row['Muslo'];
            $generales->medio = $row['Muslo_Medio'];
            $generales->pantorrilla = $row['Pantorrilla'];
        }
        $generalesJSON = json_encode($generales);
        echo $generalesJSON;

    }catch(PDOException $e){
        echo 'Error: '.$e->getMessage();
    }
    $conn = null;
?>