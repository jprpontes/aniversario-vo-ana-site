<?php

namespace App\Console\Commands;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Console\Command;

class StoreQuestionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'questions:store';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insere as questões no banco';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $questions = $this->questions();

        foreach ($questions as $key1 => $question) {
            $questionExists = Question::where('description', $question['pergunta'])->exists();

            if ($questionExists) {
                continue;
            }

            $newQuestion = Question::create([
                'description' => $question['pergunta'],
                'points'      => 3
            ]);

            foreach ($question['respostas'] as $key2 => $resposta) {
                Answer::create([
                    'description' => $resposta,
                    'correct'     => $key2 == 0,
                    'question_id' => $newQuestion->id
                ]);
            }
        }

        return Command::SUCCESS;
    }

    private function questions(): array
    {
        $questions = [
            [
                "pergunta" => "Em que ano ela nasceu?",
                "respostas" =>
                    [
                        "1939",
                        "1938",
                        "1940",
                        "1941",
                        "1937"
                    ]
                ],
            [
                "pergunta" => "Em que cidade ela nasceu?",
                "respostas" =>
                    [
                        "Raul Soares",
                        "Vermelho Novo",
                        "Caratinga",
                        "Santa Rita de Minas",
                        "Sapucaia"
                    ]
            ],
            [
                "pergunta" => "O que ela gosta de fazer nos dias de folga?",
                "respostas" =>
                    [
                        "Crochê",
                        "Jogar Baralho",
                        "Maratonar Grey's Anatomy",
                        "Cozinhar",
                        "Limpar a casa"
                    ]
            ],
            [
                "pergunta" => "Qual dessas é uma de suas refeições favoritas?",
                "respostas" =>
                    [
                        "Arroz, tutu, linguiça e almeirão",
                        "Arroz com creme de milho",
                        "Lasanha",
                        "Comida Japonesa",
                        "Feijoada"
                    ]
            ],
            [
                "pergunta" => "Qual desses é um de seus talentos culinários especiais?",
                "respostas" =>
                    [
                        "Biscoito de polvilho",
                        "Macarronada",
                        "Bolinho de atum",
                        "Salada Marroquina",
                        "Lasanha"
                    ]
            ],
            [
                "pergunta" => "Qual dessas comidas não é especialidade dela?",
                "respostas" =>
                    [
                        "Bolinho de atum",
                        "Biscoito de polvilho",
                        "Broa",
                        "Bolinho de chuva",
                        "Biscoito de nata"
                    ]
            ],
            [
                "pergunta" => "Se ela pudesse escolher uma cidade, em qualquer lugar do mundo para morar, qual seria?",
                "respostas" =>
                    [
                        "Caratinga. É feliz onde mora",
                        "Paris. Conhecer as comidas",
                        "Vaticano. Conhecer o papa",
                        "Springfield. Visitar o bar do moe ",
                        "Jerusalém. Conhecer os pontos históricos"
                    ]
            ],
            [
                "pergunta" => "Ela gosta de colecionar algo?",
                "respostas" =>
                    [
                        "Retratos",
                        "Pratos",
                        "Agulhas",
                        "Os poderes de grayskull",
                        "Discos de vinil"
                    ]
            ],
            [
                "pergunta" => "Qual bicho de estimação ela prefere?",
                "respostas" =>
                    [
                        "Cachorro",
                        "Gato",
                        "Papagaio",
                        "Trinca Ferro",
                        "Mustela putorius furo, o furão"
                    ]
            ],
            [
                "pergunta" => "Quando alguém tem uma notícia boa e outra ruim para contar, qual ela prefere ouvir primeiro?",
                "respostas" =>
                    [
                        "A notícia boa",
                        "A notícia ruim",
                        "A notícia boa, em forma de poesia",
                        "A notícia ruim, no ritmo de samba",
                        "A notícia ruim, na voz do Cid Moreira"
                    ]
            ],
            [
                "pergunta" => "Ela prefere o café com ou sem açúcar?",
                "respostas" =>
                    [
                        "Com açúcar",
                        "Sem açúcar",
                        "Não gosta de café"
                    ]
            ],
            [
                "pergunta" => "Qual tarefa doméstica ela menos gosta de fazer?",
                "respostas" =>
                    [
                        "Passar pano no chão",
                        "Lavar louça",
                        "Cozinhar",
                        "Lavar o banheiro",
                        "Lavar roupa"
                    ]
            ],
            [
                "pergunta" => "Costuma ser adiantada, pontual ou sempre chega atrasada?",
                "respostas" =>
                    [
                        "Chega adiantada",
                        "Chega atrasada",
                        "Sempre pontual",
                        "Depende do dia da semana",
                        "Sempre atrasa meia hora"
                    ]
            ],
            [
                "pergunta" => "Se pudesse aprender um idioma em um piscar de olhos, qual seria?",
                "respostas" =>
                    [
                        "Português. Satisfeita com a própria língua",
                        "Inglês. The buqui ison de teibou",
                        "Espanhol. La plata ou plumo",
                        "Italiano. Mamamia",
                        "Groot. Eu sou groot"
                    ]
            ],
            [
                "pergunta" => "Qual dessas é uma de suas novelas preferidas?",
                "respostas" =>
                    [
                        "O cravo e a rosa",
                        "Maria do Bairro",
                        "A outra",
                        "Café com aroma de mulher",
                        "Da cor do pecado"
                    ]
            ],
            [
                "pergunta" => "Qual dessas é uma de suas lembranças de infância favorita?",
                "respostas" =>
                    [
                        "Seus 15 anos. Brincava com as colegas de rodinha, andava de bicicleta",
                        "Seus 30 anos. Trabalhou em uma empresa de costura",
                        "Seus 20 anos. Quando ficou noiva do Antônio",
                        "Seus 27 anos. Conheceu Steve Jobs no evento do Apple One",
                        "Seus 28 anos. Foi presa por fundar o site Pirate Bay"
                    ]
            ],
            [
                "pergunta" => "Qual dessas foi uma das melhores viagens que ela já fez?",
                "respostas" =>
                    [
                        "Salvador. Conheceu as praias",
                        "Rio de Janeiro. Caravana da Igreja",
                        "Rondônia. Conheceu uma usina hidrelétrica",
                        "Fortaleza. Conheceu as praias",
                        "Goiânia. Show do Marcos e Belutti"
                    ]
            ],
            [
                "pergunta" => "Qual desses foi um passeio interessante que já fez?",
                "respostas" =>
                    [
                        "Serra da piedade",
                        "Dom Corrêa",
                        "Dom Cavati",
                        "São João do Oriente",
                        "Rock in Rio 2001"
                    ]
            ],
            [
                "pergunta" => "Qual horário ela costuma acordar?",
                "respostas" =>
                    [
                        "06:00",
                        "08:00",
                        "09:00",
                        "03:30",
                        "16:20"
                    ]
            ],
            [
                "pergunta" => "Ela prefere comida doce (sobremesa) ou salgada?",
                "respostas" =>
                    [
                        "Salgada",
                        "Doce"
                    ]
            ],
            [
                "pergunta" => "Qual costuma ser a melhor parte do seu dia?",
                "respostas" =>
                    [
                        "Parte da manhã. Se sente mais animada",
                        "Parte da tarde. Tomar aquele cafezinho da tarde",
                        "Parte da noite. Assistir os programas da noite",
                        "Madrugada. Descanso"
                    ]
            ],
            [
                "pergunta" => "Quais dessas três coisas ela levaria para uma ilha deserta?",
                "respostas" =>
                    [
                        "Crochê, televisão e um terço para rezar",
                        "Fogão a lenha, sofá e um livro",
                        "Crochê, Iphone 14s Pro Max e uma revista",
                        "Fogão a lenha, Sofá e uma televisão",
                        "A varinha das varinhas, a pedra da ressurreição e a capa da invisibilidade"
                    ]
            ],
            [
                "pergunta" => "O primeiro amor dela foi um amor correspondido?",
                "respostas" =>
                    [
                        "Foi correspondido. Namoraram por um tempo",
                        "Não foi correspondido, mas acabaram se casando depois",
                        "Foi correspondido. Noivaram e casaram",
                        "Não foi correspondido. Foi em um encontro da igreja",
                        "Foi correspondido, mas as gravações de 'O Estranho sem Nome' estavam muito apertadas e então terminaram o namoro. Foi a maior decepção amorosa de Clint Eastwood"
                    ]
            ],
            [
                "pergunta" => "Com quantos travesseiros ela dorme?",
                "respostas" =>
                    [
                        "1 travesseiro",
                        "2 travesseiros",
                        "Não usa travesseiros"
                    ]
            ],
            [
                "pergunta" => "Qual ocasião ela gostaria de reviver novamente?",
                "respostas" =>
                    [
                        "O casamento",
                        "Primeira comunhão",
                        "Crisma",
                        "Os 18 anos",
                        "Copa do mundo de 1970"
                    ]
            ],
            [
                "pergunta" => "Ela é do tipo que pensa demais ou simplesmente deixa as coisas acontecerem?",
                "respostas" =>
                    [
                        "Pensa bastante, se preocupa",
                        "Pensa pouco, não se preocupa",
                        "Deixa o pau quebrar"
                    ]
            ],
            [
                "pergunta" => "Ela já entrou em uma briga?",
                "respostas" =>
                    [
                        "De tapa não, só de xingar",
                        "Já entrou em confronto físico com uma colega",
                        "Nunca brigou nem xingou",
                        "Arrumava muita briga na juventude",
                        "Nunca brigou, mas certa vez ela foi assaltada e nunca mais viram o assaltante"
                    ]
            ],
            [
                "pergunta" => "Ela deixa a louça na pia de um dia para o outro ou lava tudo antes de dormir?",
                "respostas" =>
                    [
                        "Lava tudo sempre que possível, não deixa para o outro dia",
                        "Deixa pra lavar no outro dia de manhã",
                        "Deixa para lavar sempre no horário de almoço",
                        "Não lava louça",
                        "Detesta lavar louça, é a pior tarefa"
                    ]
            ],
            [
                "pergunta" => "Qual destes foi um presente especial que ela ganhou?",
                "respostas" =>
                    [
                        "Um coração feito com papel, ganhado no dia das mães",
                        "Um quadro de uma montanha, ganhado no dia das mães",
                        "Uma estátua de porcelana de um rinoceronte",
                        "Uma panela elétrica",
                        "Um grill família George Foreman"
                    ]
            ],
            [
                "pergunta" => "Ela prefere morar em que tipo de moradia?",
                "respostas" =>
                    [
                        "Casa",
                        "Apartamento",
                        "Kitnet",
                        "Casa em condomínio fechado",
                        "Prédio"
                    ]
            ],
            [
                "pergunta" => "Qual destes é um dos seus artistas preferidos?",
                "respostas" =>
                    [
                        "Eduardo Costa",
                        "Marcos e Belutti",
                        "Zezé di Camargo",
                        "Tião Carreiro",
                        "Axl Rose"
                    ]
            ],
            [
                "pergunta" => "Qual dessas músicas ela cantaria no chuveiro?",
                "respostas" =>
                    [
                        "Cabecinha no ombro",
                        "Boi Soberano",
                        "Domingo de manhã",
                        "É o Amor",
                        "Sweet child o mine"
                    ]
            ],
            [
                "pergunta" => "Qual é a combinação de comida mais estranha que ela adora?",
                "respostas" =>
                    [
                        "Feijão com farinha e café",
                        "Pão com achocolatado",
                        "Fubá com feijão",
                        "Café com Angu",
                        "Broa com Iogurte de frutas vermelhas"
                    ]
            ],
            [
                "pergunta" => "Borda da pizza: ela come ou deixa no canto do prato?",
                "respostas" =>
                    [
                        "Come tudo",
                        "Não gosta de borda da pizza",
                        "Come só se estiver mais crua"
                    ]
            ],
            [
                "pergunta" => "Qual desses utensílios ela tem em casa e quase não usa?",
                "respostas" =>
                    [
                        "A chapa de lanche industrial",
                        "O fogão a lenha",
                        "O telefone fixo",
                        "A televisão",
                        "O forno elétrico"
                    ]
            ],
            [
                "pergunta" => "O que ela gostaria de nunca ter descoberto como é feito?",
                "respostas" =>
                    [
                        "O pastel de um estabelecimento da cidade onde mora",
                        "O pão da padaria perto de casa",
                        "O polvilho",
                        "O leite de caixinha",
                        "As mansões construídas por aqueles carinhas do Youtube"
                    ]
            ],
            [
                "pergunta" => "Quais desses apelidos ela tem ou já teve?",
                "respostas" =>
                    [
                        "Aninha",
                        "Mariazinha",
                        "Anita",
                        "Ane",
                        "Maria do bairro"
                    ]
            ],
            [
                "pergunta" => "Segundo ela, qual é o jeito certo de começar a comer coxinha: por baixo ou pela pontinha?",
                "respostas" =>
                    [
                        "Pela parte de baixo",
                        "Pela parte de cima",
                        "Com uma única mordida",
                        "Num prato com garfo e faca"
                    ]
            ],
            [
                "pergunta" => "Atualmente, qual destes é um hábito comum para ela?",
                "respostas" =>
                    [
                        "Checar se a casa está fechada e se o cadeado está no portão",
                        "Assistir novela",
                        "Ir no supermercado",
                        "Costurar",
                        "Meditar"
                    ]
            ],
            [
                "pergunta" => "Qual desses passeios ela já fez que aconteceu um perrengue memorável?",
                "respostas" =>
                    [
                        "Viagem de ônibus para a Bahia. O ônibus quebrou e veio outro continuar a viagem",
                        "Viagem de ônibus para Goiânia. O ônibus quebrou e veio outro continuar a viagem",
                        "Viagem de ônibus para Aparecida. O ônibus quebrou e veio outro continuar a viagem",
                        "Viagem de ônibus para São Paulo. O ônibus quebrou e veio outro continuar a viagem",
                        "Viagem de ônibus para Ipatinga. O ônibus quebrou e veio outro continuar a viagem"
                    ]
            ],
            [
                "pergunta" => "Qual desses é ou foi um sonho recente dela?",
                "respostas" =>
                    [
                        "Andar de avião",
                        "Voar de paraglider",
                        "Viajar para o exterior",
                        "Tirar carteira de carro",
                        "Conhecer o papa"
                    ]
            ],
            [
                "pergunta" => "Quais os padrinhos de casamento dela?",
                "respostas" =>
                    [
                        "José Furtuoso, Geraldo Luiz",
                        "João Silvério, Antônio",
                        "Zezé da Ponte, Inácia da Silva",
                        "Joaquim da Silva, Juarez Moraes",
                        "Pedro da Ponte, Ana Pereira"
                    ]
            ],
            [
                "pergunta" => "Qual o nome da igreja que ela se casou?",
                "respostas" =>
                    [
                        "Igreja Nossa Senhora da Imaculada Conceição",
                        "Igreja Nossa Senhora de Fátima",
                        "Igreja Nossa Senhora do Carmo",
                        "Igreja São José",
                        "Igreja Nossa Senhora dos Anjos de Deus"
                    ]
            ],
            [
                "pergunta" => "Qual o nome do padre que celebrou seu casamento?",
                "respostas" =>
                    [
                        "Padre Manoel Moreira de Abreu",
                        "Padre Joaquim Honório da Silva",
                        "Padre Paulo Eustáquio de Araújo",
                        "Padre Pablo Escobar de Oliveira",
                        "Padre Manoel Muniz dos Santos"
                    ]
            ],
            [
                "pergunta" => "Qual a data do casamento dela?",
                "respostas" =>
                    [
                        "27 de abril, segunda-feira às 07:00",
                        "26 de abril, domingo às 07:00",
                        "28 de abril, segunda-feira às 07:00",
                        "27 de abril, domingo às 08:00",
                        "30 de fevereiro, sexta-feira às 16:20"
                    ]
            ],
            [
                "pergunta" => "Com quantos anos ela se casou?",
                "respostas" =>
                    [
                        "20 anos",
                        "19 anos",
                        "21 anos",
                        "22 anos",
                        "23 anos"
                    ]
            ],
            [
                "pergunta" => "Como foi a recepção do casamento?",
                "respostas" =>
                    [
                        "Foi oferecido um café da manhã",
                        "Foi oferecido um café da tarde",
                        "Foi oferecido um almoço",
                        "Não houve recepção",
                        "Foi oferecido um churrasco com chimarrão"
                    ]
            ],
            [
                "pergunta" => "Quais dessas atividades ela já fez para o seu sustento?",
                "respostas" =>
                    [
                        "Lavar roupa, esteira de taboa, coxinha, doce de mamão e biscoito de polvilho",
                        "Limpeza de casa, croquete, doce de goiaba, rapadura",
                        "Pão de sal, bolinho de chuva, biscoito de nata, pé de moleque",
                        "Caldo de cana, tirar leite de vaca, queijo, doce de banana, mingau de milho",
                        "Babá, arroz doce, doce de leite, quibe, marmita"
                    ]
            ],
            [
                "pergunta" => "Quais destes são seus irmãos pela ordem de idade do mais velho para o mais novo?",
                "respostas" =>
                    [
                        "1-Maria Lina, 2-José Luiz, 3-Geraldo Luiz, 4-Joaquim, 5-Firmino, 6-Ana Maria, 7-Maria da Conceição",
                        "1-José Luiz, 2-Maria Lina, 3-Geraldo Luiz, 4-Firmino, 5-Joaquim, 6-Ana Maria, 7-Maria da Conceição",
                        "1-Geraldo Luiz, 2-José Luiz, 3-Maria Lina, 4-Firmino, 5-Joaquim, 6-Ana Maria, 7-Maria da Conceição",
                        "1-Maria Lina, 2-Geraldo Luiz, 3-José Luiza, 4-Firmino, 5-Joaquim, 6-Ana Maria, 7-Maria da Conceição",
                        "1-Maria Lina, 2-José Luiz, 3-Geraldo Luiz, 4-Joaquim, 5-Firmino, 6-Maria da Conceição, 7-Ana Maria"
                    ]
            ],
            [
                "pergunta" => "Quais os nomes dos seus pais?",
                "respostas" =>
                    [
                        "Luiz Vieira de Melo e Marcolina Rodrigues",
                        "José Vieira de Melo e Marcia Rodrigues",
                        "Luiz Pinto Vieira e Marcolina da Silva",
                        "Joaquim de Melo Vieira e Maria Rodrigues",
                        "Marcos de Melo e Luiza Vieira"
                    ]
            ],
            [
                "pergunta" => "Quais os nomes dos seus tios parte de pai?",
                "respostas" =>
                    [
                        "João, Antônio, José, Ervilino, Inácia, Efigênia",
                        "Antônio, Joaquim, José, Luiz, Ana",
                        "Maria, Ervilino, Pedro, Luiza, Manoel",
                        "José, Maria, Efigênia, Adalto, Luzia, Pedro",
                        "Olinda, Lino, Joaquim, Jorge, Lina"
                    ]
            ],
            [
                "pergunta" => "Quais os nomes dos seus tios parte de mãe?",
                "respostas" =>
                    [
                        "José Anatório, Joaquim, Olinda, Maria, Estulano, Lino",
                        "Olinda, Joaquim, Pedro, Ana, Luiz, Emanuel",
                        "Estulano, Lino, José Anatório, Emanuel, Ana, João",
                        "Luzia, Luiz, Joaquim, Maria, José Sanatório, Pedro",
                        "Emanuela, Luiz, Ana, Inácia, João, José, Lino"
                    ]
            ],
            [
                "pergunta" => "Em quais dessas cidades ela morou?",
                "respostas" =>
                    [
                        "Vermelho Novo, Timóteo, Santa Rita de Minas, Caratinga",
                        "Vermelho Novo, Santa Bárbara do Leste, Dom Correia",
                        "Vermelho Novo, Coronel Fabriciano, Dom Modesto",
                        "Raul Soares, Timóteo, Santa Bárbara do Leste, Caratinga",
                        "Raul Soares, Ipatinga, Dom Cavati, Caratinga"
                    ]
            ]
        ];

        return $questions;
    }
}
