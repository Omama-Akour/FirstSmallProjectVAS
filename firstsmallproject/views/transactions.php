<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php if (! empty($transactions)): // Check if transactions array is not empty ?>
                    <?php foreach($transactions as $transaction): // Loop through each transaction ?>
                        <tr>
                            <td><?= formatDate($transaction['date']) ?></td> <!-- Format and display transaction date -->
                            <td><?= $transaction['checkNumber'] ?></td> <!-- Display check number -->
                            <td><?= $transaction['description'] ?></td> <!-- Display transaction description -->
                            <td>
                                <?php if ($transaction['amount'] < 0): // Check if transaction amount is negative ?>
                                    <span style="color: red;">
                                        <?= formatDollarAmount($transaction['amount']) ?> <!-- Display negative amount in red -->
                                    </span>
                                <?php elseif ($transaction['amount'] > 0): // Check if transaction amount is positive ?>
                                    <span style="color: green;">
                                        <?= formatDollarAmount($transaction['amount']) ?> <!-- Display positive amount in green -->
                                    </span>
                                <?php else: // If amount is zero ?>
                                    <?= formatDollarAmount($transaction['amount']) ?> <!-- Display zero amount -->
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?= formatDollarAmount($totals['totalIncome'] ?? 0) ?></td> <!-- Display total income -->
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?= formatDollarAmount($totals['totalExpense'] ?? 0) ?></td> <!-- Display total expense -->
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?= formatDollarAmount($totals['netTotal'] ?? 0) ?></td> <!-- Display net total -->
                </tr>
            </tfoot>
        </table>
    </body>
</html>
