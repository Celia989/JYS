<?php

namespace App\Jobs;

use App\CurrencyMatch;
use App\CurrencyQuotation;
use App\Logic\MicroTradeLogic;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandleMicroTrade implements ShouldQueue
{
    protected $kLineData;

    public function __construct($kline_data)
    {
        $this->kLineData = $kline_data;
    }

    public function handle()
    {
        $match_id  = $this->kLineData['match_id'] ?? null;
        $close     = $this->kLineData['close'] ?? null;

        // ① 用 match_id 找到对应的交易对（里面有 legal_id / currency_id）
        if ($match_id && $close !== null) {
            $match = CurrencyMatch::find($match_id);

            if ($match) {
                // ② 更新 currency_quotation 表里的 now_price
                $data = [
                    'legal_id'    => $match->legal_id,
                    'currency_id' => $match->currency_id,
                    'now_price'   => $close,  // 直接用 K 线最新收盘价
                    // volume 不传则保持原值，change 会在 updateTodayPriceTable 自动算
                ];
                CurrencyQuotation::updateTodayPriceTable($data);
            }
        }

        // 原来微期权的结算逻辑照旧
        MicroTradeLogic::close($match_id);
    }
}
