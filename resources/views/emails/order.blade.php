<div style="width:100%">
    <h3>ORDER ID: OID</h3>
    <table>
        <tr>
            <td>
                <h3>BILLING ADDRESS</h3>
                <div style="padding-left: 10px;">
                    <p>Address: {{ $data['address'] }}</p>
                    <p>Name: {{ $data['name'] }}</p>
                    <p>Phone: {{ $data['phone'] }}</p>
                </div>
            </td>
        </tr>
    </table>
    <h3>ORDER DETAILS</h3>
    <div>
        <table>
            <thead style="background:#cecece">
                <tr>
                    <th style="padding:10px">PRODUCT NAME</th>
                    <th style="padding:10px">IMAGE</th>
                    <th style="padding:10px">QTY</th>
                    <th style="padding:10px">PRICE</th> 
                    <th style="padding:10px">TOTAL</th>                 
                </tr>
            </thead>
            <tbody>
                @foreach($listCart as $item)
                <tr>
                    <td style="padding:10px">{{ $item->name }}</td>
                    <td style="padding:10px">                        
                        <img src="{{ $item->options['images'] }}">
                    </td>                   
                    <td style="padding:10px">
                        <div>{!! $item->qty !!}</div>
                    </td>
                    <td style="padding:10px">
                        <div>{{ number_format($item->price,0,',','.') }} VND</div>
                    </td>
                    <td style="padding:10px">
                        <div>{!! number_format(($item->price * $item->qty),0,',','.') !!} VND</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
