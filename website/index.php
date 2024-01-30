
<?php
$page = "index";
include_once 'header.php';

// Retrieve data from the investors table
$sql = "SELECT * FROM investors";
$investors = select_rows($sql);

// Retrieve data from the debtors table
$sql = "SELECT * FROM debtors";
$debtors = select_rows($sql);

// Retrieve data from the transactions table
$sql = "SELECT * FROM transactions ORDER BY date_created";
$recentTransactions = select_rows($sql);

// Retrieve data for the most paying investors
$sql = "SELECT t.*, i.name AS investor_name FROM transactions t JOIN investors i ON t.investor_id = i.id WHERE t.investor_id IS NOT NULL AND t.investor_id != '' ORDER BY t.amount DESC LIMIT 5";
$payingInvestors = select_rows($sql);

// Retrieve data for the most borrowing customers
$sql = "SELECT t.*, d.name AS debtor_name FROM transactions t JOIN debtors d ON t.debtor_id = d.id WHERE t.status = 'approved' ORDER BY t.amount DESC LIMIT 5";
$borrowingCustomers = select_rows($sql);

// Retrieve the total number of transactions
$totalTransactions = sizeof($recentTransactions);

// Retrieve the total money borrowed
$totalBorrowed = 0;
foreach ($recentTransactions as $transaction) {
    if ($transaction['status'] == 'approved') {
        $totalBorrowed += $transaction['amount'];
    }
}

// Retrieve the total money lent out
$moneyInvested = 0;
foreach ($recentTransactions as $transaction) {
    $moneyInvested += $transaction['amount'];
}
?>

<div class="container">
    <h3 class="p-3">Dashboard</h3>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <a href="investors" class='text-dark'>
                <div class="info-box">
                    <span class="info-box-icon bg-indigo"><i class="fas fa-hand-holding-usd"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Investors</span>
                        <span class="info-box-number">
                            <?= sizeof($investors) ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <a href="debtors" class='text-dark'>
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-donate"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Debtors</span>
                        <span class="info-box-number">
                            <?= sizeof($debtors) ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <a href="debtors" class='text-dark'>
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-donate"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Money Borrowed</span>
                        <span class="info-box-number">
                            <?= $totalBorrowed ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <a href="debtors" class='text-dark'>
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-donate"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Money Invested</span>
                        <span class="info-box-number">
                            <?= $moneyInvested ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
    </div>

    <!-- Charts -->
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-body">
                    <canvas id="moneyChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-body">
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Most Paying Investors and Borrowing Customers -->
    <div class="row">
        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-header">
                    Most Paying Investors
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php
                        foreach ($payingInvestors as $investor) {
                            echo "<li class='list-group-item'>" . $investor['investor_name'] . "</li>";
                        }
?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-header">
                    Most Borrowing Customers
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php
foreach ($borrowingCustomers as $customer) {
    echo "<li class='list-group-item'>" . $customer['debtor_name'] . "</li>";
}
?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Initialize and configure Chart.js -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var moneyChartCtx = document.getElementById('moneyChart').getContext('2d');
        var moneyChart = new Chart(moneyChartCtx, {
            type: 'line',
            data: {
                labels: ['Debtors', 'Investors'],
                datasets: [
                    {
                        label: 'Money Borrowed',
                        data: [<?= $totalBorrowed ?>, <?= $totalBorrowed ?>], // Replace with actual data for money borrowed
                        fill: false,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2
                    },
                    {
                        label: 'Money Invested',
                        data: [<?= $moneyInvested ?>, <?= $moneyInvested ?>], // Replace with actual data for money lent
                        fill: false,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var chartCtx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(chartCtx, {
            type: 'bar',
            data: {
                labels: ['Investors', 'Debtors'],
                datasets: [
                    {
                        label: 'Total Transactions',
                        data: [<?= sizeof($investors) ?>, <?= sizeof($debtors) ?>],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(54, 162, 235, 0.5)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    });
</script>

<?php include_once 'footer.php'; ?>
