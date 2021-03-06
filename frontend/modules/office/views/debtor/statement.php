<?php
/**
 * @var yii\web\View $this
 * @var common\models\Debtor $debtor
 * @var common\models\Court $court
 * @var common\models\info\Company $company
 */

use yii\helpers\Html;
use common\helpers\FormatHelper;

//TODO: как-то оптимизировать, вынести в отдельный класс что-ли... или найти морфер
$monthMorph = [
    'январь' => 'января',
    'февраль' => 'февраля',
    'март' => 'марта',
    'апрель' => 'апреля',
    'май' => 'мая',
    'июнь' => 'июня',
    'июль' => 'июля',
    'август' => 'августа',
    'сентябрь' => 'сентября',
    'октябрь' => 'октября',
    'ноябрь' => 'ноября',
    'декабрь' => 'декабря',
];

$debtPeriodStart = $debtor->getDebtPeriodStart();
$debtPeriodEnd = $debtor->getDebtPeriodEnd();

$finePeriodStart = (new \common\models\Fine)->recalcLoanDate($debtPeriodStart);

$debtTotal = $debtor->getDebt();
$fineTotal = $debtor->getFine();
$stateFee2 = $debtor->calculateStateFee2();

$startDebtYear = strftime('%Y', $debtPeriodStart);
$startDebtMonth = mb_strtolower(strftime('%B', $debtPeriodStart), Yii::$app->charset);
$dateDebtStart = (isset($monthMorph[$startDebtMonth]) ? $monthMorph[$startDebtMonth] . ' ' : '') . $startDebtYear;
/*$formatter = \Yii::$app->formatter;
$formatter->asDate('', '');*/

$companyFullAddress = $company->legalAddressLocation ? Html::encode($company->legalAddressLocation->createFullAddress()) : '';
$debtorFullName = $debtor->name ? Html::encode($debtor->name->createFullName()) : '';
$debtorFullAddress = $debtor->location ? Html::encode($debtor->location->createFullAddress()) : '';

$style = <<<CSS
p, 
ul li, 
ol li {
    text-indent: 4em !important;
}
ul li {
    list-style: disc inside !important;
}
ol li {
    list-style: decimal inside !important;
}
CSS;

$this->registerCss($style);

?>

    <table style="width: 100%">
        <tr>
            <td style="text-align: center; width:30%">
                <strong><?= Html::encode($company->short_name) ?></strong><br>
                ИНН <?= Html::encode($company->INN) ?><br>
                ОГРН <?= Html::encode($company->OGRN) ?><br>
                ***<br>
                адрес: <?= $companyFullAddress ?>
            </td>
            <td>
                <table style="float: right">
                    <tr>
                        <td>&nbsp;</td>
                        <td style="vertical-align:top;text-align: left;padding-bottom:.5em">
                            <strong>
                                <!--Мировому судье судебного участка № 281-->
                                <? /*= Html::encode("$court->district, $court->region") */ ?>
                                <?= Html::encode($court->name) ?>
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;text-align: right;font-weight: bold;text-decoration: underline;padding:0 1.5em 0 2em;">
                            Взыскатель
                        </td>
                        <td style="vertical-align:top;text-align: left;padding-bottom:.5em">
                            <strong><?= Html::encode($company->short_name) ?></strong><br>
                            <?= $companyFullAddress ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;text-align: right;text-decoration: underline;padding:0 1.5em 0 2em;">Должник</td>
                        <td style="vertical-align:top;text-align: left;padding-bottom:.5em">
                            <strong><?= $debtorFullName ?></strong><br>
                            <?= $debtorFullAddress ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <br>
    <br>

    № _______ от ______________<br><br><br>

    <div style="text-align: center;width: 60%;font-weight: bold;margin: auto">Заявление о выдаче судебного приказа
        <br>о взыскании задолженности за жилищно-коммунальные услуги
    </div>

    <br>

    <p style="text-indent: 4em"><strong><?= $debtorFullName ?></strong> обладает правом пользования жилого
        помещения,
        расположенного по адресу: <?= $debtorFullAddress ?></p>
    <p style="text-indent: 4em">Согласно п. 3 ст. 30, п. 1 ст. 39, ст. 153, п.п. 2, 4 ст. 154, п.п. 1, 7, 8, 10, 11 ст. 155 ЖК РФ, а также абз.
        г, д
        п. 19 Правил пользования жилыми помещениями (утв. постановлением Правительства РФ от 21 января 2006 г. N 25)
        собственник обязан своевременно вносить плату за жилое помещение и коммунальные услуги (плата за наём; плата за
        содержание и ремонт жилого помещения, включающая в себя плату за услуги и работы по управлению многоквартирным
        домом, содержанию и текущему ремонту общего имущества в многоквартирном доме; плата за коммунальные услуги) с
        момента приобретения права собственности на указанное жилое помещение.</p>
    <p style="text-indent: 4em">Кроме того, согласно п. 1 ст. 155 ЖК РФ плата за жилое помещение и коммунальные услуги вносится ежемесячно до
        десятого числа месяца, следующего за истекшим месяцем.</p>
    <p style="text-indent: 4em">В соответствие с п. 3 ст. 31 ЖК РФ члены семьи собственника жилого помещения имеют равные с собственником права и
        обязанности. Дееспособные и ограниченные судом в дееспособности члены семьи собственника жилого помещения несут
        солидарную с собственником ответственность по обязательствам.</p>
    <p style="text-indent: 4em">Согласно п. 1 ст. 323 ГК РФ при солидарной обязанности должников кредитор вправе требовать исполнения как от всех
        должников совместно, так и от любого из них в отдельности, притом как полностью, так и в части долга.</p>
    <p style="text-indent: 4em">Ответчик систематически уклоняется от внесения указанных платежей, будучи от них не освобожденным.</p>
    <p style="text-indent: 4em">Таким образом, размер задолженность ответчиков перед <?= Html::encode($company->short_name) ?> за период с
        <?= Html::encode($dateDebtStart) ?>
        по <?= Html::encode(mb_strtolower(strftime('%B %Y', $debtPeriodEnd), Yii::$app->charset)) ?> составляет
        <strong><?= Html::encode($debtTotal) ?></strong> руб. Неустойка за просрочку платежа на дату подачи
        заявления составляет
        <strong><?= Html::encode($fineTotal) ?></strong> руб.</p>
<?php /* <p style="text-indent: 4em">Руководствуясь п. 3 ст. 382 Гражданского кодекса РФ, и в соответствии с договором уступки прав (цессии) №
    2706/2017
    от «27» июня 2017 года, МП ГПЩ «ДЕЗ ЖКХ» уступило, а ООО «Альфа» ИНН 5050130861, приняло право требования
    задолженности жителей по жилищно-коммунальным услугам.</p>
<p style="text-indent: 4em">На основании вышеизложенного и в соответствии с ст.ст. 8, 11, 12, 307, 309 ГК РФ, ст.ст. 153-157 ЖК РФ, ст.ст. 3,
    4
    ГПК РФ</p> */ ?>
    <br>
    <div style="text-align: center;font-weight: bold;text-decoration: underline;margin: 0 0 .5em;">ПРОСИМ СУД:</div>

    <p style="text-indent: 4em">Вынести судебный приказ о взыскании с
        <strong><?= Html::encode($debtor->name ? $debtor->name->createFullName('родительный') : '') ?></strong> в пользу
        <?= Html::encode($company->short_name) ?>:</p>
    <!--<ul>
        <li style="text-indent: 4em">плату за жилищно-коммунальные услуги (электроснабжение ОДН, Водоотведение, Холодное в/с, Содержание ж/ф)
            запериод смай 2016г. по июнь 2017г.в размере30865,36руб.;
        </li>
        <li style="text-indent: 4em">неустойку за просрочку платежа в размере 5006,02руб.</li>
        <li style="text-indent: 4em">расходы по оплате государственной пошлины по иску в размере 638,00 руб..</li>
    </ul>-->
    <ul>
        <li style="text-indent: 4em;list-style: disc inside">
            сумму задолженности по оплате жилищно - коммунальных услуг в
            размере <?= Html::encode(FormatHelper::roubleKopek($debtTotal)) ?> за период
            с <?= Html::encode(strftime('%d.%m.%Y', $debtPeriodStart)) ?> года
            по <?= Html::encode(strftime('%d.%m.%Y', $debtPeriodEnd)) ?> года;
        </li>
        <li style="text-indent: 4em;list-style: disc inside">
            сумму пени в размере <?= Html::encode(FormatHelper::roubleKopek($fineTotal)) ?> за период
            с <?= Html::encode(strftime('%d.%m.%Y', $finePeriodStart)) ?> года
            по <?= Html::encode(strftime('%d.%m.%Y', $debtPeriodEnd)) ?> года;
        </li>
        <li style="text-indent: 4em;list-style: disc inside">
            государственную пошлину в размере <?= Html::encode(FormatHelper::roubleKopek($stateFee2)) ?>.
        </li>
    </ul>
    <br>
    <strong>Приложение:</strong><br>
    <ol>
        <li style="text-indent: 4em;list-style: decimal inside">Выписка из домовой книги;</li>
        <li style="text-indent: 4em;list-style: decimal inside">История начислений за период;</li>
        <li style="text-indent: 4em;list-style: decimal inside">Расчет пени за коммунальные услуги;</li>
        <li style="text-indent: 4em;list-style: decimal inside">Справка с сайта реформа ЖКХ об управлении домами <?= Html::encode($company->short_name) ?>;</li>
        <!--<li style="text-indent: 4em;list-style: decimal inside">Копия договора уступки прав (цессии) № 2706/2017 от 27.06.2017 г. с приложениями;</li>-->
        <li style="text-indent: 4em;list-style: decimal inside">Платежное поручение об оплате госпошлины;</li>
        <li style="text-indent: 4em;list-style: decimal inside">Копия выписка ЕГРЮЛ <?= Html::encode($company->short_name) ?></li>
    </ol>
    <br>
    <br>
    <p style="text-indent: 4em">Генеральный директор ________________ <?= Html::encode($company->cEO ? $company->cEO->createShortName() : '') ?></p>
