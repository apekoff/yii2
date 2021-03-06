<?php

namespace common\models;

use Yii;

class Fine
{
    protected $ONE_DAY;

    protected $data = [
        //[0, '01.01.2999'],
        [0, '01.01.2038'],  // на 32-битных системах
        [8.5, '18.09.2017'],
        [9.0, '19.06.2017'],
        [9.25, '02.05.2017'],
        [9.75, '27.03.2017'],
        [10.00, '19.09.2016'],
        [10.50, '14.06.2016'],
        [11.00, '01.01.2016'],
        [8.25, '14.09.2012'],
        [8, '26.12.2011'],
        [8.25, '03.05.2011'],
        [8, '28.02.2011'],
        [7.75, '01.06.2010'],
        [8, '30.04.2010'],
        [8.25, '29.03.2010'],
        [8.5, '24.02.2010'],
        [8.75, '28.12.2009'],
        [9, '25.11.2009'],
        [9.5, '30.10.2009'],
        [10, '30.09.2009'],
        [10.5, '15.09.2009'],
        [10.75, '10.08.2009'],
        [11, '13.07.2009'],
        [11.5, '05.06.2009'],
        [12, '14.05.2009'],
        [12.5, '24.04.2009'],
        [13, '01.12.2008'],
        [12, '12.11.2008'],
        [11, '14.07.2008'],
        [10.75, '10.06.2008'],
        [10.5, '29.04.2008'],
        [10.25, '04.02.2008'],
        [10, '19.06.2007'],
        [10.5, '29.01.2007'],
        [11, '23.10.2006'],
        [11.5, '26.06.2006'],
        [12, '26.12.2005'],
        [13, '15.06.2004'],
        [14, '15.01.2004'],
        [16, '21.06.2003'],
        [18, '17.02.2003'],
        [21, '07.08.2002'],
        [23, '09.04.2002'],
        [25, '04.11.2000'],
        [28, '10.07.2000'],
        [33, '21.03.2000'],
        [38, '07.03.2000'],
        [45, '24.01.2000'],
        [55, '10.06.1999'],
        [60, '24.07.1998'],
        [80, '29.06.1998'],
        [60, '05.06.1998'],
        [150, '27.05.1998'],
        [50, '19.05.1998'],
        [30, '16.03.1998'],
        [36, '02.03.1998'],
        [39, '17.02.1998'],
        [42, '02.02.1998'],
        [28, '11.11.1997'],
        [21, '06.10.1997'],
        [24, '16.06.1997'],
        [36, '28.04.1997'],
        [42, '10.02.1997'],
        [48, '02.12.1996'],
        [60, '21.10.1996'],
        [80, '19.08.1996'],
        [110, '24.07.1996'],
        [120, '10.02.1996'],
        [160, '01.12.1995'],
        [170, '24.10.1995'],
        [180, '19.06.1995'],
        [195, '16.05.1995'],
        [200, '06.01.1995'],
        [180, '17.11.1994'],
        [170, '12.10.1994'],
        [130, '23.08.1994'],
        [150, '01.08.1994'],
        [155, '30.06.1994'],
        [170, '22.06.1994'],
        [185, '02.06.1994'],
        [200, '17.05.1994'],
        [205, '29.04.1994'],
        [210, '15.10.1993'],
        [180, '23.09.1993'],
        [170, '15.07.1993'],
        [140, '29.06.1993'],
        [120, '22.06.1993'],
        [110, '02.06.1993'],
        [100, '30.03.1993'],
        [80, '23.05.1992'],
        [50, '10.04.1992'],
        [20, '01.01.1992']
    ];

    protected $MONTHS = ['янв', 'фев', 'мар', 'апр', 'май', 'июн', 'июл', 'авг', 'сен', 'окт', 'ноя', 'дек'];

    protected $datesBase = [];
    protected $percents = [];

    const DATA_TYPE_INFO = 1;
    const DATA_TYPE_PAYED = 2;

    protected $RATE_TYPE_SINGLE = 1;
    protected $RATE_TYPE_PERIOD = 2;
    protected $RATE_TYPE_PAY = 3;
    protected $RATE_TYPE_TODAY = 4;

    protected $RESULT_VIEW_SIMPLE = 0;
    protected $RESULT_VIEW_BUH = 1;

    protected $NEW_LAW; //2016, 0, 1

    //TODO: возможно, надо будет заполнить в конструкторе
    protected $VACATION_DAYS = [];
    protected $WORK_DAYS = [];


    // my variables
    protected $loanAmount;
    protected $dateStart;
    protected $dateFinish;
    protected $rateType;
    protected $back;
    protected $resultView;

    /*protected $payDates = [];
    protected $paySums = [];
    protected $payFor = []; // за месяц

    protected $loanDates = [];
    protected $loanSums = [];*/

    protected $loans = [];
    protected $payments = [];

    protected $rateTypes = [
        1 => 'на конец периода',
        2 => 'по периодам действия ставки рефинансирования',
        3 => 'на день частичной оплаты',
        4 => 'на день подачи иска в суд (сегодня)',
    ];

    protected $resultViews = [
        0 => 'Обычный',
        1 => 'Бухгалтерский',
    ];

    public function __construct()
    {
        $dataLength = count($this->data);
        for ($i = $dataLength - 1; $i >= 0; $i--) {
            //$this->datesBase[] = date_parse($this->data[$i][1]);
            $this->datesBase[] = strtotime($this->data[$i][1]); //TODO: проверить (https://www.epochconverter.com/ - выдает на день ранше)
            $this->percents[] = $this->data[$i][0];
        }

        //$this->ONE_DAY = 1000 * 60 * 60 * 24;
        $this->ONE_DAY = 60 * 60 * 24;

        $this->NEW_LAW = strtotime('2016-01-01');

        // 2016
        $this->WORK_DAYS[] = mktime(0, 0, 0, 2, 20, 2016);  //.push(new Date(2016, 1, 20));

        // 2012
        $year = 2012;
        $this->WORK_DAYS[] = mktime(0, 0, 0, 3, 11, $year);     //.push(new Date(year, 2, 11));
        $this->WORK_DAYS[] = mktime(0, 0, 0, 4, 28, $year);     //.push(new Date(year, 3, 28));
        $this->WORK_DAYS[] = mktime(0, 0, 0, 5, 12, $year);     //.push(new Date(year, 4, 12));
        $this->WORK_DAYS[] = mktime(0, 0, 0, 6, 9, $year);      //.push(new Date(year, 5, 9));
        $this->WORK_DAYS[] = mktime(0, 0, 0, 12, 29, $year);    //.push(new Date(year, 11, 29));

        // 2011
        $year = 2011;
        $this->WORK_DAYS[] = mktime(0, 0, 0, 3, 5, $year);    //.push(new Date(year, 2, 5));

        // 2017
        for ($i = 1; $i <= 8; $i++) {
            $this->VACATION_DAYS[] = mktime(0, 0, 0, 1, $i, 2017);  //strtotime("2017-1-$i");
        }
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 2, 23, 2017);  //strtotime("2017-2-23");
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 2, 24, 2017);  //strtotime("2017-2-24");
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 3, 8, 2017);  //strtotime("2017-3-8");
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 1, 2017);  //strtotime("2017-5-1");
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 8, 2017);  //strtotime("2017-5-8");
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 9, 2017);  //strtotime("2017-5-9");
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 6, 12, 2017);  //strtotime("2017-6-12");
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 11, 6, 2017);  //strtotime("2017-11-6");

        // 2016
        for ($i = 1; $i <= 8; $i++) {
            $this->VACATION_DAYS[] = mktime(0, 0, 0, 1, $i, 2016);  // . push(new Date(2016, 0, i));
        }
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 2, 22, 2016);  //.push(new Date(2016, 1, 22));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 2, 23, 2016);  //.push(new Date(2016, 1, 23));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 3, 7, 2016);  //.push(new Date(2016, 2, 7));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 3, 8, 2016);  //.push(new Date(2016, 2, 8));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 2, 2016);  //.push(new Date(2016, 4, 2));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 3, 2016);  //.push(new Date(2016, 4, 3));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 9, 2016);  //.push(new Date(2016, 4, 9));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 6, 13, 2016);  //.push(new Date(2016, 5, 13));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 11, 4, 2016);  //.push(new Date(2016, 10, 4));

        // 2015
        for ($i = 1; $i <= 9; $i++) {
            $this->VACATION_DAYS[] = mktime(0, 0, 0, 1, $i, 2015);  // . push(new Date(2015, 0, i));
        }
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 2, 23, 2015);  //.push(new Date(2015, 1, 23));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 3, 9, 2015);  //.push(new Date(2015, 2, 9));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 1, 2015);  //.push(new Date(2015, 4, 1));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 4, 2015);  //.push(new Date(2015, 4, 4));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 11, 2015);  //.push(new Date(2015, 4, 11));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 6, 12, 2015);  //.push(new Date(2015, 5, 12));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 11, 4, 2015);  //.push(new Date(2015, 10, 4));

        // 2014
        for ($i = 1; $i <= 8; $i++) {
            $this->VACATION_DAYS[] = mktime(0, 0, 0, 1, $i, 2014);  // . push(new Date(2014, 0, i));
        }
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 3, 10, 2014);  //.push(new Date(2014, 2, 10));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 1, 2014);  //.push(new Date(2014, 4, 1));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 2, 2014);  //.push(new Date(2014, 4, 2));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 9, 2014);  //.push(new Date(2014, 4, 9));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 6, 12, 2014);  //.push(new Date(2014, 5, 12));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 6, 13, 2014);  //.push(new Date(2014, 5, 13));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 11, 3, 2014);  //.push(new Date(2014, 10, 3));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 11, 4, 2014);  //.push(new Date(2014, 10, 4));

        // 2013
        for ($i = 1; $i <= 8; $i++) {
            $this->VACATION_DAYS[] = mktime(0, 0, 0, 1, $i, 2013);  // . push(new Date(2013, 0, i));
        }
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 3, 8, 2013);  //.push(new Date(2013, 2, 8));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 1, 2013);  //.push(new Date(2013, 4, 1));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 2, 2013);  //.push(new Date(2013, 4, 2));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 9, 2013);  //.push(new Date(2013, 4, 9));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 6, 12, 2013);  //.push(new Date(2013, 5, 12));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 11, 4, 2013);  //.push(new Date(2013, 10, 4));

        // 2012
        for ($i = 1; $i <= 9; $i++) {
            $this->VACATION_DAYS[] = mktime(0, 0, 0, 1, $i, 2012);  //[] = mktime(0, 0, 0, 1, $i, 2017);  // . push(new Date(2012, 0, i));
        }
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 2, 23, 2012);  //.push(new Date(2015, 1, 23));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 3, 8, 2012);  //.push(new Date(2012, 2, 8));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 3, 9, 2012);  //.push(new Date(2012, 2, 9));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 4, 30, 2012);  //.push(new Date(2012, 3, 30));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 1, 2012);  //.push(new Date(2012, 4, 1));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 8, 2012);  //.push(new Date(2012, 4, 8));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 9, 2012);  //.push(new Date(2012, 4, 9));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 6, 11, 2012);  //.push(new Date(2012, 5, 11));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 6, 12, 2012);  //.push(new Date(2012, 5, 12));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 11, 5, 2012);  //.push(new Date(2012, 10, 5));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 12, 31, 2012);  //.push(new Date(2012, 11, 31));

        // 2011
        for ($i = 1; $i <= 10; $i++) {
            $this->VACATION_DAYS[] = mktime(0, 0, 0, 1, $i, 2011);  // . push(new Date(2011, 0, i));
        }
        //TODO: why 2015 is?
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 2, 23, 2015);  //.push(new Date(2015, 1, 23));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 3, 7, 2011);  //.push(new Date(2011, 2, 7));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 3, 8, 2011);  //.push(new Date(2011, 2, 8));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 2, 2011);  //.push(new Date(2011, 4, 2));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 5, 9, 2011);  //.push(new Date(2011, 4, 9));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 6, 13, 2011);  //.push(new Date(2011, 5, 13));
        $this->VACATION_DAYS[] = mktime(0, 0, 0, 11, 4, 2011);  //.push(new Date(2011, 10, 4));
    }

    /**
     * Калькулятор пени.
     *
     * @param float $loanAmount
     * @param int $dateStart unix timestamp
     * @param int $dateFinish unix timestamp - желательно предыдущий день
     * @param array $rateType
     * @param bool $back Применять обратную силу закона (не рекомендуется)
     * @param array $payDates Частичная оплата задолженности
     */
    public function fineCalculator(
        //$loanAmount,
        //$dateStart,
        $dateFinish,
        $loans = [],     // ['sum' => $loanAmount, 'date' => $dateStart]
        $payments = [],  // ['date' => $loanAmount, 'payFor' => null, 'sum'] 'payFor' - оплата за месяц
        $rateType = 2,   // 4,
        $back = false,
        $resultView = 0
        /*$payDates = [],
        $paySums = [],
        $payFor = [],
        $loanDates = [],
        $loanSums = []*/
    )
    {
        if (!$loans) {
            return false;
        }

        $loanAmount = 0;
        $dateStart = 0;

        $dt = new \DateTime();
        $dt->setTimestamp($dateFinish);
        $dt->setTime(0, 0);
        $dateFinish = $dt->getTimestamp();

        $loansMod = [];
        foreach ($loans as $key => $l) {
            //TODO: recalcLoanDate() - косяк, думаю готовая дата уже должна быть на входе
            $l['date'] = $this->recalcLoanDate($l['date']);
            if ($key) {
                $modLoan['date'] = $l['date'];
                $modLoan['datePlus'] = $l['date'] + $this->ONE_DAY;
                $modLoan['sum'] = (float)$l['sum'];
                $loansMod[] = $modLoan;
            } else {
                //$loansMod[] = $l;
                $loanAmount = (float)$l['sum'];
                $dateStart = $l['date'];
            }
        }

        $paymentsMod = [];
        foreach ($payments as $key => $p) {
            $modPayment['date'] = $p['date'];
            $modPayment['datePlus'] = $p['date'] + $this->ONE_DAY;
            $modPayment['payFor'] = isset($p['payFor']) ? $p['payFor'] : null;
            $modPayment['sum'] = (float)$p['sum'];
            $paymentsMod[] = $modPayment;
        }

        $this->loanAmount = $loanAmount;
        $this->dateStart = $dateStart;
        $this->dateFinish = $dateFinish;
        $this->loans = $loansMod;
        $this->payments = $paymentsMod;
        $this->rateType = $rateType;
        $this->back = $back;
        $this->resultView = $resultView;
        /*$this->payDates = $payDates;
        $this->paySums = $paySums;
        $this->payFor = $payFor;
        $this->loanDates = $loanDates;
        $this->loanSums = $loanSums;*/

        return $this->updateData(true);
    }

    /**
     * Коррекция "чтобы пеня считалась в калькуляторе с 11 числа рабочего дня"
     * TODO: сделать учет с рабочего дня если 11 попадает на выходной
     *
     * @param int $date unix timestamp
     * @return int
     */
    public function recalcLoanDate($date)
    {
        $dateObj = new \DateTime();
        $dateObj->setTimestamp($date);
        $d = $dateObj->format('d');
        $m = $dateObj->format('m');
        $Y = $dateObj->format('Y');
        if ($d < 11) {
            $dateObj->setDate($Y , $m , 11);
        }
        return $dateObj->getTimestamp();
    }


    protected function dateParse($dateStr)
    {
        return $dateStr;
        /*if (dateStr == null) return null;
        var dateParts = dateStr.split(".");
        if (dateParts.length != 3)
            return null;
        var d = new Date(dateParts[2], (dateParts[1] - 1), dateParts[0]);
        if (d && !isNaN(d.getTime())) {
            var fy = parseInt(dateParts[2]);
            if (fy < 50)
                d.setFullYear(2000 + fy);
            else if (fy < 100)
                d.setFullYear(1900 + fy);
            return d;
        }
        return null;*/
    }

    protected function wrongData($id)
    {
//	var d = $('#' + id);
//	d.addClass('error-field');
    }


    protected function testPaymentLine($payDate, $paySum, $payFor)
    {
        if (!($payDate['value'] && $paySum['value'])) {
            return ['date' => null, 'sum' => null, 'isCurrent' => false];
        }
        $resDate = null;
        if ($payDate['value']) {
            $resDate = $this->dateParse($payDate['value']);
            //if (resDate.getFullYear() < 1990) {
            if (date('Y', $resDate) < 1990) {
                $resDate = null;
            }
        }

        if (!$resDate) {
            $this->wrongData($payDate);
            return null;
        }

        $resSum = null;
        if ($paySum['value']) {
            $resSum = $this->normalizeLoan($paySum['value']);
        }

        if (!$resSum) {
            $this->wrongData($paySum);
            return null;
        }

        $resFor = null;
        if ($payFor['value']) {
            //TODO: '01.' = ???
            //$resFor = $this->dateParse('01.' + $payFor['value']);
            $resFor = $this->dateParse($payFor['value']);
            if (!$resFor) {
                $this->wrongData($payFor);
                return null;
            }
        }

        return ['date' => $resDate, 'datePlus' => $resDate + $this->ONE_DAY, 'sum' => $resSum, 'payFor' => $resFor];
    }

    protected function normalizeLoan($money)
    {
        //$money = ($money).replace(',', '.').replace(/ /g,"").replace(/ /g,"");
        $money = str_replace([',', ' '], ['.', ''], $money);
        return (float)$money;
    }

    protected function collectPayments()
    {
        return $this->payments;
        return [];  //TODO: fix
        $res = [];
        $payDates = $this->payDates;
        if ($payDates) {
            return $res;
        }
        $val = null;
        if ($payDates) {// больше, чем 2 оплаты
            $paySums = $this->paySums;
            $payOrders = $this->payFor;
            for ($i = 0; $i < count($payDates); $i++) {
                $val = $this->testPaymentLine($payDates[$i], $paySums[$i], $payOrders[$i]);
                if (!$val) {
                    return null;
                }
                if ($val['date'] != null) {
                    $res[] = $val;
                }
            }
        } else {
            $val = $this->testPaymentLine($payDates[0], $this->paySums[0], $this->payFor[0]);
            if (!$val) {
                return null;
            }
            if ($val['date'] != null) {
                $res[] = $val;
            }
        }

        return $res;
    }

    protected function collectLoans()
    {
        /*foreach ($this->loans as $key => $loan) {
            $this->loans[$key]['date'] = $this->checkVacationInput(false, $loan['date'], true);
            $this->loans[$key]['datePlus'] = $this->loans[$key]['date'] + $this->ONE_DAY;   //TODO: не совсем правильных подход, эта операция производится раньше
        }*/
        return $this->loans;
        /*$res = [];
        $payDates = $this->loanDates;
        if (!$payDates) {
            return $res;
        }
        $val = null;
        if ($payDates) {// больше, чем 2 оплаты
            $paySums = $this->loanSums;
            for ($i = 0; $i < count($payDates); $i++) {
                $val = $this->testLoanLine($payDates[$i], $paySums[$i]);
                if (!$val) {
                    return null;
                }
                if ($val['date'] != null) {
                    $res[] = $val;
                }
            }
        } else {
            $val = $this->testLoanLine($this->loanDates, $this->loanSums);
            if (!$val) {
                return null;
            }
            if ($val['date'] != null) {
                $res[] = $val;
            }
        }

        return $res;*/
    }

    /*protected function preparePayments($payments)
    {
        if (!$payments) {
            return '';
        }
        $res = '';
//        for ($i = 0; $i < count($payments); $i++) {
//            $p = $payments[$i];
//            $res .= ';' . fd($p['date']) . '_' . $p['sum'] . '_' . ($p['payFor'] ? (($p['payFor'].getMonth() < (10 - 1)? '0' : '') . ($p['payFor'].getMonth() + 1)) . '.' . $p['payFor'].getFullYear(): '');
//        }
        return substr($res, 1);     //.substring(1);
    }*/

    protected function fd($date)
    {
        //TODO: исправить костыль
        if (is_string($date)) {
            $date = strtotime($date);
        }
        return date('d.m.Y', $date);   //day + '.' + monthIndex + '.' + year;
    }

    protected function prepareLoans($payments)
    {
        if (!$payments) {
            return '';
        }
        $res = '';
        for ($i = 0; $i < count($payments); $i++) {
            $p = $payments[$i];
            $res .= ';' . $this->fd($p['date']) . '_' . $p['sum'];
        }
        return substr($res, 1);
    }

    protected function updateHash($requestData)
    {
        $this->uh($requestData);
    }

    protected function uh($requestData) // just an url hash?
    {
        $res = '';
        foreach ($requestData as $word => $data) {
            if ($data) {
                $res .= "&" . $word . "=" . $data;
            }
        }

    }

    protected function clearLoans(&$arr)     // Отчистка долгов с отрицательной суммой
    {
        $res = [];
        $i = 0;
        $arrLength = count($arr);
        while ($i < $arrLength) {
            $c = $arr[$i];
            if ($c['sum'] < 0) {
                $res[] = ['date' => $c['date'], 'datePlus' => isset($c['datePlus']) ? $c['datePlus'] : null, 'sum' => -$c['sum'], 'payFor' => null];
                //arr.splice(i, 1);
                unset($arr[$i]);
            }
            $i++;
        }
        $arr = array_values($arr);
        return $res;
    }

    protected function checkVacation($date)
    {
        $dow = date('w', $date);
        $time = $date;  //date.getTime();
        if ($dow == 0 || $dow == 6) {
            $workDaysLength = count($this->WORK_DAYS);
            for ($i = 0; $i < $workDaysLength; $i++) {
                if ($this->WORK_DAYS[$i] == $time) {
                    return false;
                }
            }
            return true;
        }
        $vacationDaysLength = count($this->VACATION_DAYS);
        for ($i = 0; $i < $vacationDaysLength; $i++) {
            if ($this->VACATION_DAYS[$i] == $time) {
                return true;
            }
        }
        return false;
    }

    //protected function checkVacationInput($errorId, $inputId, $isExpire)
    public function checkVacationInput($errorId, $date, $isExpire)
    {
        //return;

        //$input = document . getElementById($inputId);
        //$d = $this->dateStart;
        $d = $date;
        if ($isExpire) {
            $d = $date - $this->ONE_DAY;     //$d.setDate($d.getDate() - 1);
        }

        //$el = $errorId ? $('#' + $errorId) : null;
        if (!$d || !$this->checkVacation($d)) {
            //$(input) . removeClass('warning-field');
            //if (el) el . hide();
            return $date;
        }
        // это выходной!
        do {
            $d = $d + $this->ONE_DAY; //new Date(d . getTime() + ONE_DAY);
        } while ($this->checkVacation($d));
        //$(input) . addClass('warning-field');
        $newDate = $isExpire ? $d + $this->ONE_DAY : $d;
        return $newDate;
        /*if (el) {
            if (isExpire)
                el . html('Дата, предшествующая дню просрочки, установлена на выходной день. Согласно <a style="color:#990000" target="_blank" href="https://dogovor-urist.ru/кодексы/гк_рф_1/статья_193/">ст. 193 ГК РФ</a> необходимо изменить дату на ближайший рабочий день.<br><a href="javascript:" onclick="$el = document.getElementById(\'' + inputId + '\'); el.value=\'' + newDate + '\'; el.onchange()">Изменить на ' + newDate + '</a>');
            else
                el . html('Дата установлена на выходной день. Согласно <a style="color:#990000" target="_blank" href="https://dogovor-urist.ru/кодексы/гк_рф_1/статья_193/">ст. 193 ГК РФ</a> необходимо изменить дату на ближайший рабочий день. <a href="javascript:" onclick="$el = document.getElementById(\'' + inputId + '\'); el.value=\'' + newDate + '\'; el.onchange()">Изменить на ' + newDate + '</a>');
            el . show();
        }*/
    }

    protected function sortLoans($arr)
    {
        //return $arr;
        $arrLength = count($arr);
        for ($i = 0; $i + 1 < $arrLength; $i++)
            for ($j = $i + 1; $j < $arrLength; $j++)
                if ($arr[$i]['date'] > $arr[$j]['date']) {
                    $tmp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $tmp;
                }
        return $arr;
    }

    protected function sortPayments($arr)
    {
        //return $arr;
        $arrLength = count($arr);
        for ($i = 0; $i + 1 < $arrLength; $i++) {
            for ($j = $i + 1; $j < $arrLength; $j++) {
                if ($arr[$i]['date'] > $arr[$j]['date']) {
                    $tmp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
        return $arr;
    }

    protected function splitPayments($payments, $loans, $loanAmount, $dateStart, $dateFinish)
    {
        $res = [];
        //$loans = $loans.slice(0);
        $loans = array_values($loans);  //$loans = $loans.slice(0); ???
        $loansLength = count($loans);
        for ($i = 0; $i < $loansLength; $i++) {
            $res[$i] = [];
            $c = $loans[$i];
            //$loans[$i] = ['sum' => $c['sum'], 'date' => $c['date'], 'month' => $c['date'].getFullYear()*12 + c.date.getMonth(), order: c.order];
            //$loans[$i] = ['sum' => $c['sum'], 'date' => $c['date'], 'month' => date('Y', $c['date']) * 12 + date('n', $c['date']) - 1, 'order' => $c['order']];
            $loans[$i] = ['sum' => $c['sum'], 'date' => $c['date'], 'month' => date('Y', $c['date']) * 12 + date('n', $c['date']) - 1, 'order' => (isset($c['order']) ? $c['order'] : '')];
        }

        $paymentsLength = count($payments);
        for ($i = 0; $i < $paymentsLength; $i++) {
            $payment = &$payments[$i];
            if ($payment['payFor']) {
                //$curMonth = payment.payFor.getFullYear()*12 + payment.payFor.getMonth() + 1;
                //$curMonth = date('Y', $payment['payFor']) * 12 + date('n', $payment['payFor']);
                $curMonth = date('Y', $payment['payFor']) * 12 + date('n', $payment['payFor']);
                // ищем текущий месяц
                for ($j = 0; $j < count($loans); $j++) {
                    if ($loans[$j]['month'] == $curMonth) {
                        break;
                    }
                }

                if ($j < count($loans)) { // нашли
                    $loan = $loans[$j];
                    $toCut = min($payment['sum'], $loan['sum']);
                    if ($toCut >= 0.01) {
                        $loan['sum'] -= $toCut;
                        $payment['sum'] -= $toCut;
                        $res[$j][] = ['date' => $payment['date'], 'datePlus' => $payment['datePlus'], 'sum' => $toCut, 'payFor' => $payment['payFor']];
                    }
                }
            }

            for ($j = 0; $j < count($loans) && $payment['sum'] > 0; $j++) {
                $loan = &$loans[$j];
                $toCut = min($payment['sum'], $loan['sum']);

                if ($toCut >= 0.01) {
                    $loan['sum'] -= $toCut;
                    $payment['sum'] -= $toCut;
                    $res[$j][] = ['date' => $payment['date'], 'datePlus' => $payment['datePlus'], 'sum' => $toCut, 'payFor' => $payment['payFor']];
                }
            }
        }
        return $res;
    }

    protected function pushRules($dates, $percents, $rules, $dateStartUser, $dateFinishUser)
    {
        $res = [];
        $len = count($dates);
        $ds = $dateStartUser;
        $df = $dateFinishUser;
        $rulePos = 0;
        for ($i = 0; $i + 1 < $len; $i++) {
            $dateStart = $dates[$i];
            $dateFinish = $dates[$i + 1] - $this->ONE_DAY;
            if ($dateFinish < $ds || $dateStart > $df) {
                continue;
            }
            if ($dateStart < $ds) {
                $dateStart = $ds;
            }
            if ($dateFinish > $df) {
                $dateFinish = $df;
            }

            for ($j = $rulePos; $j < count($rules); $j++) {
                $rule = $rules[$j];
                $ruleStart = $rule['dateStart'];
                $ruleEnd = $rule['dateFinish'];

                if ($ruleStart < $dateStart && $ruleEnd >= $dateStart && $ruleEnd <= $dateFinish) { // [ dS]dF
                    $res[] = ['rate' => $rule['rate'], 'dateStart' => $dateStart, 'dateFinish' => $rule['dateFinish'], 'percent' => $percents[$i]];
                } else if ($ruleStart < $dateStart && $ruleEnd > $dateFinish) { // [ dS dF ]
                    $res[] = ['rate' => $rule['rate'], 'dateStart' => $dateStart, 'dateFinish' => $dateFinish, 'percent' => $percents[$i]];
                } else if ($ruleStart >= $dateStart && $ruleEnd <= $dateFinish) // dS[ ]dF
                    $res[] = ['rate' => $rule['rate'], 'dateStart' => $ruleStart, 'dateFinish' => $ruleEnd, 'percent' => $percents[$i]];
                else if ($ruleStart >= $dateStart && $ruleStart <= $dateFinish && $ruleEnd > $dateFinish) // dS[dF ]
                    $res[] = ['rate' => $rule['rate'], 'dateStart' => $ruleStart, 'dateFinish' => $dateFinish, 'percent' => $percents[$i]];
                else { // не было периода в диапазоне ставки
                    $res[] = ['rate' => $rule['rate'], 'dateStart' => $dateStart, 'dateFinish' => $dateFinish, 'percent' => $percents[$i]];
                }
                if ($ruleEnd <= $dateFinish) {
                    $rulePos++;
                    if ($ruleEnd == $dateFinish) {
                        break;
                    }
                } else {
                    break;
                }
            }
        }

        for ($i = 0; $i < count($res); $i++) {    //(возможно) TODO: зачем это? - похоже, в JS формируется ссылка на объект
            $d = $res[$i];
            //$d['dateStart'] = new Date(d.dateStart);
            //$d['dateFinish'] = new Date(d.dateFinish);
        }

        return $res;
    }

    protected function dateDiff($date1, $date2)
    {
        $date1_ms = $date1;
        $date2_ms = $date2;
        $difference_ms = $date1_ms - $date2_ms;
        $absDiff = round($difference_ms / $this->ONE_DAY);
        return $absDiff + 1;

    }

    protected function toDigitsAfter($amount, $digitsAfter)
    {
        //TODO: ??? - 'e'
        $number = +round(+($amount . 'e' . $digitsAfter)) . 'e' . -$digitsAfter;
        return number_format($number, $digitsAfter);
    }


    protected function getRate($part)
    {
        if ($part == '1/300') {
            return 1. / 300;
        }
        if ($part == '1/130') {
            return 1. / 130;
        }
        return 0;
    }

    protected function countCost($money, $days, $percent, $ratePart)
    {
        $res = $money * $days * $percent * $ratePart / 100.;
        $res = round($res, 2);
        //return (float)$this->toDigitsAfter($res, 2);
        return $res;
    }

    protected function processData($sum, $data, $dateStart, $dateFinish)
    {
        $rate = isset($data['rate']) ? $data['rate'] : 0;
        $percent = isset($data['percent']) ? $data['percent'] : 0;
        $ratePart = $rate;
        $days = $this->dateDiff($dateFinish, $dateStart);
        return [
            'rate' => $rate,
            'percent' => $percent,
            'cost' => $this->countCost($sum, $days, $percent, $this->getRate($ratePart)),
            'days' => $days,
            'dateStart' => $dateStart,
            'dateFinish' => $dateFinish,
            'sum' => $sum
        ];
    }


    /**
     * @param $sum
     * @param int $dateStart Datetime
     * @param int $dateFinish Datetime
     * @param $payments
     * @param $rateType
     * @param $reverse
     */
    protected function countForPeriod($sum, $dateStart, $dateFinish, $payments, $rateType, $reverse)
    {
        $rulesData = [];
        if ($reverse) {
            $newDate = $dateStart;
            $days30 = $dateStart + (30 - 1) * $this->ONE_DAY;
            $days90 = $dateStart + (90 - 1) * $this->ONE_DAY;

            if ($newDate <= $days30) {
                $till = ($dateFinish > $days30) ? $days30 : $dateFinish;
                $rulesData[] = ['rate' => '0', 'dateStart' => $newDate, 'dateFinish' => $till];

            }
            if ($newDate <= $days90 && $dateFinish > $days30) {
                $from = ($newDate > $days30) ? $newDate : $days30 + $this->ONE_DAY;
                $till = ($dateFinish > $days90) ? $days90 : $dateFinish;
                $rulesData[] = ['rate' => '1/300', 'dateStart' => $from, 'dateFinish' => $till];
            }

            if ($dateFinish > $days90) {
                $from = ($newDate >= $days90) ? $newDate : $days90 + $this->ONE_DAY;
                $rulesData[] = ['rate' => '1/130', 'dateStart' => $from, 'dateFinish' => $dateFinish];
            }
        } else {
            if ($dateStart < $this->NEW_LAW) {
                $newDate = ($dateFinish >= $this->NEW_LAW) ? ($this->NEW_LAW - $this->ONE_DAY) : $dateFinish;
                $rulesData[] = ['rate' => '1/300', 'dateStart' => $dateStart, 'dateFinish' => $newDate];
            }

            if ($dateFinish >= $this->NEW_LAW) {
                $newDate = ($dateStart < $this->NEW_LAW) ? $this->NEW_LAW : $dateStart;
                $days30 = $dateStart + (30 - 1) * $this->ONE_DAY;
                $days90 = $dateStart + (90 - 1) * $this->ONE_DAY;

                if ($newDate <= $days30) {
                    $till = ($dateFinish > $days30) ? $days30 : $dateFinish;
                    $rulesData[] = ['rate' => '0', 'dateStart' => $newDate, 'dateFinish' => $till];

                }
                if ($newDate <= $days90 && $dateFinish > $days30) {
                    $from = ($newDate > $days30) ? $newDate : $days30 + $this->ONE_DAY;
                    $till = ($dateFinish > $days90) ? $days90 : $dateFinish;
                    $rulesData[] = ['rate' => '1/300', 'dateStart' => $from, 'dateFinish' => $till];
                }

                if ($dateFinish > $days90) {
                    $from = ($newDate >= $days90) ? $newDate : $days90 + $this->ONE_DAY;
                    $rulesData[] = ['rate' => '1/130', 'dateStart' => $from, 'dateFinish' => $dateFinish];
                }
            }
        }

        $preData = [];

        if ($rateType == $this->RATE_TYPE_SINGLE) {
            $dateFinishInd = 0;
            for ($i = count($this->datesBase) - 1; $i >= 0; $i--)
                if ($dateFinish >= $this->datesBase[$i]) {
                    $dateFinishInd = $i;
                    break;
                }
            //$preData = pushRules([$dateStart, new Date(3000, 0, 1)], [percents[dateFinishInd], 0], rulesData, dateStart, dateFinish);
            $preData = $this->pushRules(
                [
                    $dateStart,
                    mktime(0, 0, 0, 1, 1, 2038),
                ],
                [
                    $this->percents[$dateFinishInd],
                    0,
                ],
                $rulesData,
                $dateStart,
                $dateFinish);
        } else if ($rateType == $this->RATE_TYPE_PAY) {
            $payDates = [$dateStart];
            $payPercents = [];
            $curPercents = 0;
            for ($i = 0; $i < count($payments) && $curPercents < count($this->datesBase); $i++) {
                for (; $curPercents < count($this->percents); $curPercents++) {
                    if ($payments[$i]['date'] < $this->datesBase[$curPercents]) {
                        $payDates[] = $payments[$i]['datePlus'];
                        $payPercents[] = $curPercents >= 1 ? $this->percents[$curPercents - 1] : 0;
                        break;
                    }
                }
            }
            $dateFinishInd = 0;
            for ($i = count($this->datesBase) - 1; $i >= 0; $i--) {
                if ($dateFinish >= $this->datesBase[$i]) {
                    $payPercents[] = $this->percents[$i];
                    break;
                }
            }
            $payDates[] = mktime(0, 0, 0, 1, 1, 2038);
            $payPercents[] = 0;

            $preData = $this->pushRules($payDates, $payPercents, $rulesData, $dateStart, $dateFinish);

        } else if ($rateType == $this->RATE_TYPE_TODAY) {
            $today = time();
            //today.setHours(0, 0, 0, 0);
            $dt = new \DateTime();
            $dt->setTimestamp($today);
            $dt->setTime(0, 0);
            $today = $dt->getTimestamp();
            $dateFinishInd = 0;
            for ($i = count($this->datesBase) - 1; $i >= 0; $i--) {
                if ($today >= $this->datesBase[$i]) {
                    $dateFinishInd = $i;
                    break;
                }
            }
            $preData = $this->pushRules(
                [
                    $dateStart,
                    mktime(0, 0, 0, 1, 1, 2038),
                ],
                [
                    $this->percents[$dateFinishInd],
                    0,
                ],
                $rulesData,
                $dateStart,
                $dateFinish
            );
        } else {
            $preData = $this->pushRules($this->datesBase, $this->percents, $rulesData, $dateStart, $dateFinish);
        }

        $resData = [];
        $startJ = 0;

        $data = null;

        for ($j = $startJ; $j < count($payments); $j++) {   //TODO: gr of count()
            $payment = $payments[$j];
            if ($dateStart <= $payment['datePlus']) { // убрал, потому что если платёж 12.02.2015, а просрочка с 16.02.2015, то расчёт ведётся только с 01.01.2016
                break;
            }

            $toCut = null;
            if ($payment['sum'] <= $sum) {
                $toCut = $payment['sum'];
                $sum -= $payment['sum'];
                $payment['sum'] = 0;
            } else {
                $toCut = $sum;
                $payment['sum'] -= $sum;
                $sum = 0;
            }

            $resData[] = ['type' => self::DATA_TYPE_PAYED, 'data' => ['sum' => $toCut, 'date' => $payment['date'], 'order' => (isset($payment['order']) ? $payment['order'] : '')]];
        }
        $startJ = $j;

        for ($i = 0; $i < count($preData); $i++) {  //TODO: rg of count()
            $data = $preData[$i];
            $lastStartJ = $startJ;
            for ($j = $startJ; $j < count($payments) && $sum > 0; $j++) {
                $payment = $payments[$j];
                if ($payment['sum'] >= 0.01 && $payment['datePlus'] <= $data['dateFinish']) {
                    $startJ = $j + 1;
                    $dateStartInPeriod = null;
                    if ($payment['datePlus'] > $data['dateStart']) {
                        if ($j == 0 || $j >= 1 && $payments[$j - 1]['datePlus'] < $data['dateStart']) {
                            $resData[] = ['type' => self::DATA_TYPE_INFO, 'data' => $this->processData($sum, $data, $data['dateStart'], $payment['date'])];
                        }
                        $dateStartInPeriod = $payment['datePlus'];
                    } else {
                        $dateStartInPeriod = $data['dateStart'];
                    }
                    $toCut = null;
                    if ($payment['sum'] <= $sum) {
                        $toCut = $payment['sum'];
                        $sum -= $payment['sum'];
                        $payment['sum'] = 0;
                    } else {
                        $toCut = $sum;
                        $payment['sum'] -= $sum;
                        $sum = 0;
                    }

                    $resData[] = ['type' => self::DATA_TYPE_PAYED, 'data' => ['sum' => $toCut, 'date' => $payment['date'], 'order' => isset($payment['order']) ? $payment['order'] : '']];

                    if ($sum < 0.01) {
                        $sum = 0;
                        continue;
                    }

                    $paymentsLength = count($payments);
                    if ($j + 1 >= $paymentsLength || $j + 1 < $paymentsLength && $payments[$j + 1]['datePlus'] > $data['dateFinish'] && $payment['date'] != $payments[$j + 1]['date']) {
                        $resData[] = ['type' => self::DATA_TYPE_INFO, 'data' => $this->processData($sum, $data, $dateStartInPeriod, $data['dateFinish'])];
                    } else if ($j + 1 < $paymentsLength && $payments[$j + 1]['datePlus'] <= $data['dateFinish'] && $payment['date'] != $payments[$j + 1]['date']) {
                        $resData[] = ['type' => self::DATA_TYPE_INFO, 'data' => $this->processData($sum, $data, $dateStartInPeriod, $payments[$j + 1]['date'])];
                    }

                } else {//if (data.dateFinish <= payment.date) { // все остальные платежи уже из будущих
                    break;
                }
            }
            if ($sum < 0.01) {
                $sum = 0;
                break;
            }
            if ($lastStartJ == $startJ) { // не было периода в диапазоне ставки
                $resData[] = ['type' => self::DATA_TYPE_INFO, 'data' => $this->processData($sum, $data, $data['dateStart'], $data['dateFinish'])];
            }
        }

        for ($j = $startJ; $j < count($payments); $j++) {
            $payment = $payments[$j];
            $toCut = null;
            if ($payment['sum'] <= $sum) {
                $toCut = $payment['sum'];
                $sum -= $payment['sum'];
                $payment['sum'] = 0;
            } else {
                $toCut = $sum;
                $payment['sum'] -= $sum;
                $sum = 0;
            }

            $resData[] = ['type' => self::DATA_TYPE_PAYED, 'data' => ['sum' => $toCut, 'date' => $payment['date'], 'order' => isset($payment['order']) ? $payment['order'] : '']];
        }
        return ['dateStart' => $dateStart, 'dateFinish' => $dateFinish, 'data' => $resData, 'endSum' => (float)$sum];
    }


    protected function updateData($showErrors)
    {
        $dates = $this->datesBase;
        //$('.calc .error-field').removeClass('error-field');
        #$clips = $('.resultAppearing');
        #clips.hide();
        $hash = [];
        $errors = [];

        $loanAmount = $hash['loanAmount'] = $this->loanAmount;
        if (!$loanAmount) {
            throw new \Exception(Yii::t('app', 'Не введена сумма задолженности'));
        } else {
            $loanAmount = $this->normalizeLoan($loanAmount);
            if (!$loanAmount) {
                throw new \Exception(Yii::t('app', 'Сумма задолженности не верна'));
            }
        }

        //$dateStart = dateParse(hash['dateStart'] = ggg('dateStart'));
        $dateStart = $hash['dateStart'] = $this->dateStart;
        if (!$dateStart) {
            throw new \Exception(Yii::t('app', 'Дата начала периода не введена'));
        } elseif ($dateStart > $dates[count($dates) - 1]) {
            throw new \Exception(Yii::t('app', 'Дата начала периода слишком большая'));
        }

        $dateFinish = $hash['dateFinish'] = $this->dateFinish;
        if (!$dateFinish) {
            throw new \Exception(Yii::t('app', 'Дата конца периода не введена'));
        } else if ($dateFinish > $dates[count($dates) - 1]) {
            throw new \Exception(Yii::t('app', 'Дата конца периода слишком большая'));
        }

        $totalDays = ($dateFinish - $dateStart) / $this->ONE_DAY;
        if ($totalDays <= 1) {
            throw new \Exception(Yii::t('app', 'Дата начала периода оказалась больше даты окончания'));
        }

        $rateType = $hash['rateType'] = $this->rateType;
        if (!$this->rateType) {
            throw new \Exception(Yii::t('app', 'Тип расчёта процентных ставок не выбран'));
        }

        $reverse = $hash['back'] = $this->back;
        $resultView = $hash['resultView'] = $this->resultView;

        $payments = $this->collectPayments();
        if ($payments === null) {
            throw new \Exception(Yii::t('app', 'Ошибка заполнения полей погашения задолженности'));
        }
        $loans = $this->collectLoans();
        if ($loans === null) {
            throw new \Exception(Yii::t('app', 'Ошибка заполнения полей новых задолженностей'));
        }

        // Похоже, не задействовано?
        #$hash['payments'] = $this->preparePayments($payments);
        #$hash['loans'] = $this->prepareLoans($loans);

        $this->updateHash($hash);
        //$this->checkVacationInput('lfWarn', 'dateStart', true);

        //$loans.unshift({sum: loanAmount, date: dateStart, order: ''});
        array_unshift($loans, ['sum' => $loanAmount, 'date' => $dateStart, 'order' => '']);

        $toPayments = $this->clearLoans($loans);
        $loans = $this->sortLoans($loans);
        $payments = $this->sortPayments(array_merge($payments, $toPayments));

        $payments = $this->splitPayments($payments, $loans, $loanAmount, $dateStart, $dateFinish);

        $periods = [];
        for ($i = 0; $i < count($loans); $i++) {    //TODO: gr of count()
            $loan = $loans[$i];
            $periods[] = $this->countForPeriod($loan['sum'], $loan['date'], $dateFinish, $payments[$i], $rateType, $reverse);
        }

        array_walk_recursive($periods, function (&$item, $key) {
            if ($key == 'dateStart' || $key == 'dateFinish') {
                $item = date(DATE_ATOM, $item);
            }
        });

        return $periods;

        // html format
//        echo '<pre>';
//        print_r($periods);
//        echo '</pre>';
        //$resultPane = ($resultView == $this->RESULT_VIEW_BUH) ? $this->getBuhHtml($periods) : $this->getClassicHtml($periods);

//	document . getElementById('dateStartRes') . innerHTML = fd(dateStart);
//	document . getElementById('dateFinishRes') . innerHTML = fd(dateFinish);
//	document . getElementById('rateTypeRes') . innerHTML = document . getElementById('rateType') . options[document . getElementById('rateType') . selectedIndex] . innerHTML;

    }

    public function getEndSum($periods)
    {
        $endSum = 0;
        $periodsLength = count($periods);
        for ($i = 0; $i < $periodsLength; $i++) {
            $period = $periods[$i];
            $html = $this->getBuhMonthHtml($period, false);
            $endSum += $html['endSum'];
        }

        return $endSum;
    }

    public function getHtml($data, $totalSteadily = 0)
    {
        $dateStart = $data['dateStart'];
        $resData = $data['data'];
        $total = 0;
        $resultString =
            '<tr><td colspan="8"><h4 style="text-align: left">Расчёт пеней по задолженности, возникшей ' . $this->fd($dateStart) . '</h4></td></tr>' .
            //'<table class="judge-table jt-2">' .
            '<tr class="head">' .
            '<td rowspan="2">Задолженность</td>' .
            '<td colspan="3">Период просрочки</td>' .
            '<td rowspan="2">Ставка</td>' .
            '<td rowspan="2">Доля ставки</td>' .
            '<td rowspan="2">Формула</td>' .
            '<td rowspan="2">Пени</td>' .
            '</tr>' .
            '<tr class="head"><td>с</td><td>по</td><td>дней</td></tr>';

        //$totalSteadily = 0;

        $resDataLength = count($resData);
        for ($i = 0; $i < $resDataLength; $i++) {
            $r = $resData[$i];
            if ($r['type'] == self::DATA_TYPE_INFO) {
                $resultString .= '<tr>' .
                    '<td>' . $this->moneyFormat($r['data']['sum']) . '</td>' .
                    '<td>' . $this->fd($r['data']['dateStart']) . '</td>' .
                    '<td>' . $this->fd($r['data']['dateFinish']) . '</td>' .
                    '<td>' . $r['data']['days'] . '</td>' .
                    '<td>' . $this->moneyFormat($r['data']['percent']) . ' %</td>' .
                    '<td>' . $r['data']['rate'] . '</td>' .
                    '<td>' . $this->moneyFormat($r['data']['sum']) . ' × ' . $r['data']['days'] . ' × ' . $r['data']['rate'] . ' × ' . $r['data']['percent'] . '% </td>' .
                    '<td>' . $this->moneyFormat($r['data']['cost']) . ' р.</td>' .
                    '</tr>';
                $total += $r['data']['cost'];
            } else if ($r['type'] == self::DATA_TYPE_PAYED) {
                $resultString .= '<tr class="jt-payed">'
                    . '<td>-' . $this->moneyFormat($r['data']['sum']) . '</td>'
                    . '<td>' . $this->fd($r['data']['date']) . '</td>'
                    . '<td colspan="6" style="text-align: left">Погашение части долга' . ($r['data']['order'] ? ' (' . $r['data']['order'] . ')' : '') . '</td></tr>';
            }
        }
        $resultString .= '<tr class="calc-footer"><td></td><td></td><td></td><td></td><td></td><td></td><td style="text-align: right"><b>Итого:</b></td><td><b>' . $this->moneyFormat($total) . '</b> р.</td></tr>';

        //$totalSteadily += $total;
        $resultString .= '<tr class="calc-footer"><td></td><td></td><td></td><td></td><td></td><td></td><td style="text-align: right"><b>Итого сумма:</b></td><td><b>' . $this->moneyFormat($totalSteadily + $total) . '</b> р.</td></tr>';

        return ['html' => $resultString, 'totalPct' => $total, 'endSum' => $data['endSum']];
    }

    public function getClassicHtml($periods)
    {
        $resultString = '<table class="judge-table jt-2">';
        $totalPct = 0;
        $endSum = 0;
        $periodsLength = count($periods);

        for ($i = 0; $i < $periodsLength; $i++) {
            $period = $periods[$i];
            $html = $this->getHtml($period, $totalPct);
            $resultString .= $html['html'];
            $totalPct += $html['totalPct'];
            $endSum += $html['endSum'];
        }

        $resultString .= '<tr><td colspan="8" style="font-size:14px; text-align: right">Сумма основного долга: ' . $this->moneyFormat($endSum) . ' руб.</td></tr>';
        $resultString .= '<tr><td colspan="8" style="font-size:14px; text-align: right">Сумма пеней по всем задолженностям: ' . $this->moneyFormat($totalPct) . ' руб.</td></tr>';
        $resultString .= '</table>';
        return $resultString;
    }


    //TODO: вынести во вью
    public function getBuhHtml($periods)
    {
        $resultString = '<table class="judge-table jt-4">' .
            '<tr class="head">' .
            '<td rowspan="2">Период</td>' .
            '<td rowspan="2">Начислено</td>' .
            '<td rowspan="2">Задолженность</td>' .
            '<td colspan="3">Период просрочки</td>' .
            '<td rowspan="2">Ставка</td>' .
            '<td rowspan="2">Доля ставки</td>' .
            '<td rowspan="2">Формула</td>' .
            '<td rowspan="2">Пени</td>' .
            '</tr>' .
            '<tr class="head"><td>с</td><td>по</td><td>дней</td>' .
            '</tr>';
        $totalPct = 0;
        $endSum = 0;
        $periodsLength = count($periods);
        for ($i = 0; $i < $periodsLength; $i++) {
            $period = $periods[$i];
            $html = $this->getBuhMonthHtml($period, false);
            $resultString .= $html['html']; //TODO: what is it
            $totalPct += $html['totalPct'];
            $endSum += $html['endSum'];
        }

        $resultString .= '<tr><td colspan="10" style="font-size:14px; text-align: right">Сумма основного долга: ' . $this->moneyFormat($endSum) . ' руб.</td></tr>';
        $resultString .= '<tr><td colspan="10" style="font-size:14px; text-align: right">Сумма пеней по всем задолженностям: ' . $this->moneyFormat($totalPct) . ' руб.</td></tr>';
        $resultString .= '</table>';
        return $resultString;
    }

    public function getBuhMonthHtml($data, $isFirst)
    {
        $resData = $data['data'];
        if (count($resData) == 0) {
            return ['html' => '', 'totalPct' => 0, 'endSum' => 0];
        }
        $dateStart = $data['dateStart'];
        $total = 0;
        $resultString = null;
        $r = null;
        $resDataLength = count($resData);
        for ($i = 0; $i < $resDataLength; $i++) {
            $r = $resData[$i];
            if ($r['type'] == self::DATA_TYPE_INFO) {
                break;
            }
        }

        // TODO: нужно нормально подводить сумму начислений, а не костялять
        $sum = $i == $resDataLength ? 0 : $r['data']['sum'];
        for ($i--; $i >= 0; $i--) {
            $d = $resData[$i];
            $sum += $d['data']['sum'];
        }


        $r = $resData[0];
        $resultString = '<tr class="jtb-first">' .
            ($isFirst ? '<td rowspan="' . $resDataLength . '">сальдо на<br>' . $this->fd($dateStart) . '</td>'
                : '<td rowspan="' . $resDataLength . '">' . $this->buhDate($dateStart) . '</td>'
            )
            . '<td rowspan="' . $resDataLength . '">' . $this->moneyFormat($sum) . '</td>';
        if ($r['type'] == self::DATA_TYPE_INFO) {
            $resultString .= '<td>' . $this->moneyFormat($r['data']['sum']) . '</td>' .
                '<td>' . $this->fd($r['data']['dateStart']) . '</td>' .
                '<td>' . $this->fd($r['data']['dateFinish']) . '</td>' .
                '<td>' . $r['data']['days'] . '</td>' .
                '<td>' . $this->moneyFormat($r['data']['percent']) . ' %</td>' .
                '<td>' . $r['data']['rate'] . '</td>' .
                '<td>' . $this->moneyFormat($r['data']['sum']) . ' × ' . $r['data']['days'] . ' × ' . $r['data']['rate'] . ' × ' . $r['data']['percent'] . '% </td>' .
                '<td>' . $this->moneyFormat($r['data']['cost']) . ' р.</td>' .
                '</tr>';
            $total += $r['data']['cost'];
        } else {
            $resultString .=
                '<td class="jt-payed">-' . $this->moneyFormat($r['data']['sum']) . '</td>' .
                '<td class="jt-payed">' . $this->fd($r['data']['date']) . '</td>' .
                '<td class="jt-payed" colspan="6" style="text-align: left">Погашение части долга' . ($r['data']['order'] ? ' (' . $r['data']['order'] . ')' : '') . '</td></tr>';
        }

        for ($i = 1; $i < $resDataLength; $i++) {
            $r = $resData[$i];
            if ($r['type'] == self::DATA_TYPE_INFO) {
                $resultString .= '<tr>' .
                    '<td>' . $this->moneyFormat($r['data']['sum']) . '</td>' .
                    '<td>' . $this->fd($r['data']['dateStart']) . '</td>' .
                    '<td>' . $this->fd($r['data']['dateFinish']) . '</td>' .
                    '<td>' . $r['data']['days'] . '</td>' .
                    '<td>' . $this->moneyFormat($r['data']['percent']) . ' %</td>' .
                    '<td>' . $r['data']['rate'] . '</td>' .
                    '<td>' . $this->moneyFormat($r['data']['sum']) . ' × ' . $r['data']['days'] . ' × ' . $r['data']['rate'] . ' × ' . $r['data']['percent'] . '% </td>' .
                    '<td>' . $this->moneyFormat($r['data']['cost']) . ' р.</td>' .
                    '</tr>';
                $total += $r['data']['cost'];
            } elseif ($r['type'] == self::DATA_TYPE_PAYED) {
                $resultString .= '<tr class="jt-payed">' .
                    '<td>-' . $this->moneyFormat($r['data']['sum']) . '</td>' .
                    '<td>' . $this->fd($r['data']['date']) . '</td>' .
                    '<td colspan="6" style="text-align: left">Погашение части долга' . ($r['data']['order'] ? ' (' . $r['data']['order'] . ')' : '') . '</td></tr>';
            }
        }
        return [
            'html' => $resultString,
            'totalPct' => $total,
            'endSum' => $data['endSum']
        ];

    }

    function moneyFormat($money)
    {
        //return $this->addCommas(parseFloat(money).toFixed(2)).replace(/\./g, ',');
        $moneyParsed = number_format(floatval($money), 2, ',', ' ');
        return $moneyParsed;
    }

    function buhDate($date)
    {
        //TODO: исправить костыль
        if (is_string($date)) {
            $date = strtotime($date);
        }
        //var newMonth = (date.getMonth() + 11) % 12;
        $newMonth = (date('n', $date) - 1 + 11) % 12;
        $year = date('Y', $date) - (($newMonth == 11) ? 1 : 0);
        return $this->MONTHS[$newMonth] . '.' . $year;
    }
}
