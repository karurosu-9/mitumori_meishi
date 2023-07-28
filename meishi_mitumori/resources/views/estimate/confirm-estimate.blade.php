<!-- 見積用のレイアウトを使用 -->
@extends('layouts.estimate-layout')

@section('title', '見積り-確認')

@section('content')
    <br>
    <br>
    <br>
    <h1>【 {{ $corp->corp_name }} の見積り-確認 】</h1>
    <br>
    <br>
    <div class="estimate">
        <div class="content">
            <div class="no-print">
                <br>
                <br>
                <br>
                <br>
            </div>
            <div class="title">
                御見積書
            </div>
            <br>
            <br>
            <br>
            <div class="date">
                {{ $formattedDate }}
            </div>
            <div class="corp">
                {{ $corp->corp_name }} 　　御中
            </div>
            <br>
            下記の通り御見積申し上げます。<br>
            <br>
            <div class="group2">
                <div class="condition">
                    <div class="place">
                        受渡場所<span class="place-span1">{{ $myCorp->place }}</span>
                    </div>
                    <div class="place">
                        取引条件<span class="place-span2">{{ $myCorp->conditions }}</span>
                    </div>
                    <div class="place">
                        見積有効期限<span class="place-span3">{{ $myCorp->deadline }}</span>
                    </div>
                    <br>
                </div>
                <div class="image">
                    <img class="image" src="{{ asset('/img/アスカプランニング角印.png') }}" width="95px" height="95px"
                        alt="角印">
                </div>
                <div class="mycorp">
                    <div class="group3">
                        <div class="postal">
                            〒{{ $postalCode }}
                        </div>
                        <div class="address">
                            {{ $myCorp->address }}
                        </div>
                    </div>
                    <div class="corp_name">
                        {{ $myCorp->corp_name }}
                    </div>
                    <div class="group4">
                        <div class="tel">
                            TEL {{ $tel }}
                        </div>
                        <div class="fax">
                            FAX {{ $fax }}
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <table>
                <tr>
                    <th width="620px" class="tekiyo">摘要</th>
                    <th width="80px" class="unit_price">単価</th>
                    <th width="80px" class="quantity">数量</th>
                    <th width="120px" class="amount">金額</th>
                    <th width="50px" class="note">備考</th>
                </tr>
                @for ($i = 1; $i <= EstimateFormCountConsts::FORM_NOT_HOSOKU; $i++)
                    @if (empty($sessionDataAmount[$i]))
                        @continue
                    @endif
                    <tr>
                        <td>{{ $sessionDataTekiyo[$i] }}</td>
                        <td>{{ number_format($sessionDataUnitPrice[$i]) }}</td>
                        <td>{{ $sessionDataQuantity[$i] }}</td>
                        <td>{{ number_format($sessionDataAmount[$i]) . ' -' }}</td>
                        <td style="border:none; width: 500px">{{ $sessionDataNote[$i] }}</td>
                    </tr>
                @endfor
                <tr>
                    <td colspan="1" class="total_price">合計</td>
                    <td class="none"></td>
                    <td class="none"></td>
                    <td class="all_total_price">{{ '¥' . number_format($sessionDataTotalPrice) . ' -' }}</td>
                </tr>
            </table>
            <br>
            <div>【補足】</div>
            @for ($i = 1; $i <= EstimateFormCountConsts::FORM_HOSOKU; $i++)
                <div class="hosoku">
                    @if (empty($sessionDataHosoku[$i]))
                    @break
                @endif
                <div> {{ $sessionDataHosoku[$i] }} </div>
        @endfor
    </div>
</div>

<div class="no_print">
    <br>
    <br>
    <br>
    <div class="button">
        <button type="button" onclick="history.back()">見積り入力フォームに戻る</button>
        @if (Route::currentRouteName() === 'estimate.addConfirmEstimate')
            <button type="button"
                onclick="cofirmRegisterData({{ route('estimate.createEstimate', ['corp' => $corp]) }})">登録</button>
        @elseif (Route::currentRouteName() === 'estimate.edtiConfirmEstimate')
            <button type="button"
                onclick="confirmRegisterData({{ route('estimate.updateEstimate', ['corp' => $cprp, 'estimate' => $estimate]) }})">更新</button>
        @endif
    </div>
</div>
</div>
</div>
<br>
<br>

<script>
    const FORM_NOT_HOSOKU = {{ \App\Consts\EstimateFormCountConsts::FORM_NOT_HOSOKU }};
</script>

<script src="{{ asset('js/estimate.js') }}"></script>
@endsection
