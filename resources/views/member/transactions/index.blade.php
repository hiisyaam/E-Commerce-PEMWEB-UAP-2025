<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-[#A4133C]">Riwayat Transaksi</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">

        <style>
            .card-wrap {
                background: #fff;
                padding: 25px;
                border-radius: 16px;
                box-shadow: 0 4px 20px rgba(0,0,0,0.08);
                border: 1px solid #eee;
            }
            table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0 8px;
            }
            thead th {
                color: #444;
                font-weight: 700;
                padding-bottom: 10px;
            }
            tbody tr {
                background: #fafafa;
                border-radius: 12px;
                transition: .2s;
            }
            tbody tr:hover {
                background: #f1f1f1;
            }
            tbody td {
                padding: 14px 12px;
            }
            .status-paid {
                color: green;
                font-weight: 600;
            }
            .status-unpaid {
                color: #A4133C;
                font-weight: 600;
            }
        </style>

        <div class="card-wrap">

            <h3 class="text-2xl font-bold mb-4 text-[#A4133C]">Riwayat Transaksi</h3>

            <table>
                <thead>
                    <tr>
                        <th class="text-left">Kode</th>
                        <th class="text-left">Produk</th>
                        <th class="text-left">Total</th>
                        <th class="text-left">Status</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($transactions as $t)
                        <tr>
                            <td>
                                {{ $t->code }}
                            </td>

                            <td>
                                @php $first = $t->details->first(); @endphp
                                {{ $first ? $first->product->name : 'Tidak ada produk' }}
                            </td>

                            <td>
                                Rp {{ number_format($t->grand_total, 0, ',', '.') }}
                            </td>

                            <td>
                                <span class="status-{{ $t->payment_status }}">
                                    {{ ucfirst($t->payment_status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>

</x-app-layout>
