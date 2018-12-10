<?php

require_once dirname(__DIR__) . '/Exceptions/PolicyException.php';

/**
 * Class Policy
 */
class Policy
{
    /**
     * Base price of policy is 11% from entered car value,
     * except every Friday 15-20 o’clock (user time) when it is 13%
     * @var float
     */
    public $basePrice;
    /**
     * @var float
     */
    public $commission;
    /**
     * @var float|int
     */
    public $tax;
    /**
     * Different payments separately
     * @var array
     */
    public $payments;
    /**
     * @var float|int
     */
    public $value;

    /**
     * Policy constructor.
     * @param array $options
     * @throws PolicyException
     */
    public function __construct(array $options)
    {
        if (!$options['est']) {
            throw new PolicyException('Estimated value of the car is require');
        } else {
            $this->value = (int)$options['est'];
            $this->basePrice = $this->value * 0.11;
        }

        $this->commission = $this->basePrice * 0.17;

        if (!$options['tax'] && $options['tax'] != 0) {
            throw new PolicyException('Tax percentage is require');
        } else {
            $this->tax = $options['tax'] / 100 * $this->basePrice;
        }

        $this->payments = $this->calculatePayments($options['instalments']);
    }

    /**
     * Calculate different payments separately
     * @param int $instalments
     * @return array
     */
    protected function calculatePayments(int $instalments = 1) : array
    {
        if ($instalments == 1) {
            return [];
        }

        $payments = [];
        $base = round($this->basePrice / $instalments, 2);
        $commission = round($this->commission / $instalments, 2);
        $tax = round($this->tax / $instalments, 2);

        for ($i = 0; $i < $instalments; $i++) {
            if ($i == $instalments - 1) {
                $base = round($this->basePrice - ($base * ($instalments - 1)), 2);
                $commission = round($this->commission - ($commission * ($instalments - 1)), 2);
                $tax = round($this->tax - ($tax * ($instalments - 1)), 2);
            }
            $total = $base + $commission + $tax;

            $payments[$i] = [
                'base_price' => $base,
                'commission' => $commission,
                'tax' => $tax,
                'total' => $total
            ];
        }

        return $payments;
    }

    /**
     * Convert object to array
     * @return array
     */
    public function toArray() : array
    {
        return [
            'base_price' => $this->basePrice,
            'commission' => $this->commission,
            'tax' => $this->tax,
            'total' => round($this->basePrice + $this->commission + $this->tax, 2),
            'value' => $this->value,
            'payments' => $this->payments
        ];
    }

    /**
     * Convert object to json-string
     * @return string
     */
    public function toJson() : string
    {
        return json_encode($this->toArray());
    }
}
