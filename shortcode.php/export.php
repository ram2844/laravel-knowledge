<!-- // in switch case  -->

<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportOrder implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        Order::$withoutAppends = true;
        $orders = Order::query()->select(
            'created_at',
            'order_number',
            'member_number',
            'firm_name',
            'name',
            'email',
            'contact',
            'payment_status',
            'order_status'
        );

        if ($this->startDate && $this->endDate) {
            $orders->whereBetween('created_at', [$this->startDate, $this->endDate]);
        }

        return $orders->get()->map(function ($order) {
             $paymentStatus = '';    
                switch ($order->payment_status) {
                    case 0:
                        $paymentStatus = 'pending';
                        break;
                    case 1:
                        $paymentStatus = 'complete';
                        break;
                    case 2:
                        $paymentStatus = 'failed';
                        break;
                    case 3:
                        $paymentStatus = 'cancel';
                        break;
                    default:
                        $paymentStatus = 'unknown';
                }

                $orderStatus = '';    
                switch ($order->order_status) {
                    case 0:
                        $orderStatus = 'pending';
                        break;
                    case 1:
                        $orderStatus = 'complete';
                        break;
                    case 2:
                        $orderStatus = 'failed';
                        break;
                    case 3:
                        $orderStatus = 'cancel';
                        break;
                    default:
                        $orderStatus = 'unknown';
                }
            return [
                $order->created_at,
                $order->order_number,
                $order->member_number,
                $order->firm_name,
                $order->name,
                $order->email,
                $order->contact,
                $paymentStatus,
                $orderStatus
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Date',
            'Order Id',
            'Member Number',
            'Firm',
            'Name',
            'Email',
            'Contact',
            'Payment Status',
            'Order Status'
        ];
    }
}
 // and  in array case and turnery oprater 

<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportOrder implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        Order::$withoutAppends = true;
        $orders = Order::query()->select(
            'created_at',
            'order_number',
            'member_number',
            'firm_name',
            'name',
            'email',
            'contact',
            'payment_status',
            'order_status'
        );

        if ($this->startDate && $this->endDate) {
            $orders->whereBetween('created_at', [$this->startDate, $this->endDate]);
        }

        return $orders->get()->map(function ($order) {
            $paymentStatuses = ['pending', 'complete', 'failed', 'cancel'];
            $orderStatuses = ['pending', 'complete', 'failed', 'cancel'];
            return [
                $order->created_at,
                $order->order_number,
                $order->member_number,
                $order->firm_name,
                $order->name,
                $order->email,
                $order->contact,
                $paymentStatuses[$order->payment_status] ?? 'pending',
                $orderStatuses[$order->order_status] ?? 'pending',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Date',
            'Order Id',
            'Member Number',
            'Firm',
            'Name',
            'Email',
            'Contact',
            'Payment Status',
            'Order Status'
        ];
    }
}
