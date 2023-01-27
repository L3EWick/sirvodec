<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Acesso;
use App\Models\Login;
use App\Models\Local;
use App\Models\Setor;
use App\Models\User;
use App\Models\Cargo;
use App\Models\Guarda;
use App\Models\Sequencia;


if (! function_exists('formataNrTrocaServico')) {
   function formataNrTrocaServico($nr,$dt){
      
      return str_pad($nr,4,'0',STR_PAD_LEFT) ."/" .substr($dt,0,4);
      
   }
}

if (! function_exists('acesso')) {
   function acesso($cargos) {

      foreach ($cargos as $key => $cargo) {
            
         if( Auth::user()->hasRole($cargo) ){
            return 1;
         } 

      }
/* 
      foreach ($cargos as $key => $cargo) {
         if( $cargo == 'TI'){
            $ehTI = Auth::user()->hasRole('TI');
            if( $ehTI){
               return 1;
            }
         }else{
            $cargoid = Cargo::where('cargo', $cargo)->first()->id;
            return $cargoid;
            if( Guarda::where('funcionario_id', Auth::user()->id)->first()->cargo_id == $cargoid ){
               return 1;
            }
             
         }


      } */
      return 0;
   }
}

if (! function_exists('proximaSequencia')) {
   function proximaSequencia($sequenciaSolicitada) {

      $sequencia = Sequencia::first();
      if(! isset($sequencia)){

         $sequencia = new Sequencia;
         $sequencia->$sequenciaSolicitada = 1;
         $sequencia->save();   
         return 1;
      }
      
      $sequencia_atual  = $sequencia->$sequenciaSolicitada;
      $proximovalor     = $sequencia_atual + 1;   
      
      $sequencia->$sequenciaSolicitada = $proximovalor;
      $sequencia->save();

      return $proximovalor;
   }
}


if (! function_exists('pegaValorEnum')) {
   function pegaValorEnum($table, $column, $ordena = false, $outro_banco = false) {

      if($outro_banco){
         $type = DB::connection('mysql_sisseg')->select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
      }else{
         $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
      }
      preg_match('/^enum\((.*)\)$/', $type, $matches);
      $enum = array();
      foreach( explode(',', $matches[1]) as $value )
      {
         $v = trim( $value, "'" );
         $enum[] = $v;
      } 

      if($ordena){
         sort($enum);
      }
         
      return $enum;
   }
}

if (! function_exists('calculaIdade')) {
   function calculaIdade($nascimento, $obito = null) {

      // separando yyyy, mm, ddd do NASCIMENTO
      list($ano, $mes, $dia) = explode('-', $nascimento);

      // Descobre a unix timestamp da data de nascimento do fulano
      $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);


      if($obito != null){
         // separando yyyy, mm, ddd do OBITO
         list($obito_ano, $obito_mes, $obito_dia) = explode('-', $obito);

         // Descobre a unix timestamp da data de nascimento do fulano
         $obito = mktime( 0, 0, 0, $obito_mes, $obito_dia, $obito_ano);
         

         // cálculo
         $idade = intval(floor((((($obito - $nascimento) / 60) / 60) / 24) / 365.25));
         //echo "Idade: $idade Anos";
         

      }else{

         // data atual
         $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
   
   
         // cálculo
         $idade = intval(floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25));
         //echo "Idade: $idade Anos";
            
      }

      return $idade;
   }
}

if (! function_exists('diasEntreDatas')) {
   function diasEntreDatas($data1, $data2) {
      if($data1 == null)
         $data1 = date("Y-m-d");
      

      // Calcula a diferença em segundos entre as datas
      $diferenca = strtotime($data1) - strtotime($data2);

      //Calcula a diferença em dias
      $dias = floor($diferenca / (60 * 60 * 24));
      return $dias;
   }
}


if (! function_exists('retiraMascaraCPF')) {
   function retiraMascaraCPF($cpf) {
      $cpf = trim($cpf);
      $cpf = str_replace(".", "", $cpf);
      $cpf = str_replace("-", "", $cpf);
      return $cpf;
   }
}



if (! function_exists('formataTelefone')) {
   function formataTelefone($TEL){
      $tam = strlen(preg_replace("/[^0-9]/", "", $TEL));
      if ($tam == 13) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
         return "+".substr($TEL,0,$tam-11)."(".substr($TEL,$tam-11,2).")".substr($TEL,$tam-9,5)."-".substr($TEL,-4);
      }
      if ($tam == 12) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
         return "+".substr($TEL,0,$tam-10)."(".substr($TEL,$tam-10,2).")".substr($TEL,$tam-8,4)."-".substr($TEL,-4);
      }
      if ($tam == 11) { // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
         return "(".substr($TEL,0,2).")".substr($TEL,2,5)."-".substr($TEL,7,11);
      }
      if ($tam == 10) { // COM CÓDIGO DE ÁREA NACIONAL
         return "(".substr($TEL,0,2).")".substr($TEL,2,4)."-".substr($TEL,6,10);
      }
      if ($tam <= 9) { // SEM CÓDIGO DE ÁREA
         return substr($TEL,0,$tam-4)."-".substr($TEL,-4);
      }
   }
}


if (! function_exists('formataCPF_CNPJ')) {
   function formataCPF_CNPJ($cnpj_cpf)
   {
   if (strlen(preg_replace("/\D/", '', $cnpj_cpf)) === 11) {
      $response = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
   } else {
      $response = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
   }

   return $response;
   }
}

if (! function_exists('parametros')) {
   function parametros()
   {
      $parametros = [];
      $local = Local::where('nome', substr( Auth::user()->roles[0]->sistema->nome, 4))->first();
      
      $parametros = [
         'nome_modulo'  => $local->nome,
         'modulo'       => $local,
         'setores'      => Setor::where('local_id', $local->id)->get() ,
      ];
      
      return $parametros;
   }
}




if (! function_exists('registra_login')) {
   function registra_login($motivo, $login )
   {
   
      //verifica se já está logado
      //if(Auth::user())
      $user = User::where('email', $login)->first();
      
      if($user)
      {
         $logado        = $user->id;
      }else{
         $logado        = '0';
      }

      //$ip            = $_SERVER["REMOTE_ADDR"];
      //$maquina       = $_SERVER["REMOTE_HOST"];

      $ip            = pega_ip();
      $maquina       = exec('hostname');
      $local_user    = exec('whoami');

     //dd($ip);

      $login = new Login([
         'motivo'          => $motivo,
         'ip'              => $ip,
         'maquina'         => $maquina,
         'local_user'      => $local_user,
         'user_id'         => $logado,
         'login'           => $login
      ]);

      return $login->save(); 
   }
}

function pega_ip() 
{

   $ip;
   if     (getenv("HTTP_CLIENT_IP"))         $ip = getenv("HTTP_CLIENT_IP");
   else if(getenv("HTTP_X_FORWARDED_FOR"))   $ip = getenv("HTTP_X_FORWARDED_FOR"); 
   else if(getenv("REMOTE_ADDR"))            $ip = getenv("REMOTE_ADDR");
   else                                      $ip = "UNKNOWN";
   return $ip;
}

