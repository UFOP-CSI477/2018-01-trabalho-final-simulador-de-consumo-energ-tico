<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['date_start','date_finish','watts','spend','tax','room','user_id','distr_id'];
    /*
		~Detalhamento dos dados~
		Date: data de criação do relatório
		Watts: total gasto até aquele momento em kW
		Spend: custo final
		Tax: tarifa utilizada para calcular
				0 - Bandeira Verde (tarifa convencional - cadastrada no sistema)
				1 - Bandeira Amarela (acréscimo de R$ 0,010 para cada quilowatt-hora (kWh) consumidos)
				2 - Bandeira Vermelha - Patamar 1 (acréscimo de R$ 0,030 para cada quilowatt-hora kWh consumido)
				3 - Bandeira vermelha - Patamar2 (acréscimo de R$ 0,050 para cada quilowatt-hora kWh consumido)
		Room: relação dos cômodos a serem avaliados
				0 - Todos os comodos
				id - para comodos isolados

    */
}
