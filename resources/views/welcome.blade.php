@extends('layouts.app')
@section('pageTitle', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="mb-0 fade-in">Sand Mining Dashboard</h2>
                <p class="text-muted fade-in">Welcome to your sand mining management system</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card primary fade-in">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-card-title">River Points</div>
                            <div class="stat-card-value">12</div>
                            <div class="d-flex align-items-center mt-2">
                                <i class="bi bi-arrow-up"></i>
                                <span>2 new this month</span>
                            </div>
                        </div>
                        <div class="stat-card-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card success fade-in">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-card-title">Active Tenders</div>
                            <div class="stat-card-value">8</div>
                            <div class="d-flex align-items-center mt-2">
                                <i class="bi bi-arrow-up"></i>
                                <span>3 new this week</span>
                            </div>
                        </div>
                        <div class="stat-card-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card danger fade-in">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-card-title">Sand Stock (CFT)</div>
                            <div class="stat-card-value">45,280</div>
                            <div class="d-flex align-items-center mt-2">
                                <i class="bi bi-arrow-down"></i>
                                <span>5% from last week</span>
                            </div>
                        </div>
                        <div class="stat-card-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="stat-card warning fade-in">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-card-title">Today's Sales</div>
                            <div class="stat-card-value">₹125,400</div>
                            <div class="d-flex align-items-center mt-2">
                                <i class="bi bi-arrow-up"></i>
                                <span>12% from yesterday</span>
                            </div>
                        </div>
                        <div class="stat-card-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row mb-4">
            <div class="col-xl-8 mb-4">
                <div class="card fade-in">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Monthly Sales Trend</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                Last 6 Months
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Last 3 Months</a></li>
                                <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                <li><a class="dropdown-item" href="#">Last Year</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="salesChart" height="100"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 mb-4">
                <div class="card fade-in">
                    <div class="card-header">
                        <h5 class="mb-0">Sand Types Distribution</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="sandTypesChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities Table -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Recent Activities</h5>
                        <a href="#" class="btn btn-sm btn-primary">View All</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-container">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Details</th>
                                        <th>Activity</th>
                                        <th>Date</th>
                                        <th>River Point</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#SALE-001</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://picsum.photos/seed/client1/30/30.jpg" alt="Client"
                                                    class="rounded-circle me-2" width="30" height="30">
                                                <span>ABC Construction</span>
                                            </div>
                                        </td>
                                        <td>Sand Sale</td>
                                        <td>Jun 15, 2023</td>
                                        <td>River Point A</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button>
                                                <button class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#TND-002</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://picsum.photos/seed/client2/30/30.jpg" alt="Client"
                                                    class="rounded-circle me-2" width="30" height="30">
                                                <span>XYZ Builders</span>
                                            </div>
                                        </td>
                                        <td>New Tender</td>
                                        <td>Jun 14, 2023</td>
                                        <td>River Point B</td>
                                        <td><span class="badge bg-warning">Active</span></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button>
                                                <button class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#STK-003</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://picsum.photos/seed/river1/30/30.jpg" alt="River Point"
                                                    class="rounded-circle me-2" width="30" height="30">
                                                <span>River Point C</span>
                                            </div>
                                        </td>
                                        <td>Stock Update</td>
                                        <td>Jun 14, 2023</td>
                                        <td>River Point C</td>
                                        <td><span class="badge bg-info">Updated</span></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button>
                                                <button class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#VHC-004</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://picsum.photos/seed/vehicle1/30/30.jpg" alt="Vehicle"
                                                    class="rounded-circle me-2" width="30" height="30">
                                                <span>Truck #TR-001</span>
                                            </div>
                                        </td>
                                        <td>Maintenance</td>
                                        <td>Jun 13, 2023</td>
                                        <td>Fleet</td>
                                        <td><span class="badge bg-danger">Pending</span></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button>
                                                <button class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>#WRK-005</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://picsum.photos/seed/worker1/30/30.jpg" alt="Worker"
                                                    class="rounded-circle me-2" width="30" height="30">
                                                <span>Rajesh Kumar</span>
                                            </div>
                                        </td>
                                        <td>Attendance</td>
                                        <td>Jun 13, 2023</td>
                                        <td>River Point A</td>
                                        <td><span class="badge bg-success">Present</span></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button>
                                                <button class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top River Points and Sand Types Row -->
        <div class="row mb-4">
            <div class="col-xl-6 mb-4">
                <div class="card fade-in">
                    <div class="card-header">
                        <h5 class="mb-0">Top River Points by Production</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <img src="https://picsum.photos/seed/river1/50/50.jpg" alt="River Point"
                                    class="rounded-circle">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">River Point A</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Location: North Bank</span>
                                    <span>15,200 CFT</span>
                                </div>
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 95%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <img src="https://picsum.photos/seed/river2/50/50.jpg" alt="River Point"
                                    class="rounded-circle">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">River Point B</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Location: South Bank</span>
                                    <span>12,800 CFT</span>
                                </div>
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <img src="https://picsum.photos/seed/river3/50/50.jpg" alt="River Point"
                                    class="rounded-circle">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">River Point C</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Location: East Bank</span>
                                    <span>10,500 CFT</span>
                                </div>
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 65%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <img src="https://picsum.photos/seed/river4/50/50.jpg" alt="River Point"
                                    class="rounded-circle">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">River Point D</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Location: West Bank</span>
                                    <span>8,200 CFT</span>
                                </div>
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 51%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="https://picsum.photos/seed/river5/50/50.jpg" alt="River Point"
                                    class="rounded-circle">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">River Point E</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Location: Central</span>
                                    <span>6,800 CFT</span>
                                </div>
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 42%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-4">
                <div class="card fade-in">
                    <div class="card-header">
                        <h5 class="mb-0">Sand Types by Demand</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px;">
                                    <span class="fw-bold">A</span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Construction Grade</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Quality: Standard</span>
                                    <span>45% Demand</span>
                                </div>
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 45%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px;">
                                    <span class="fw-bold">B</span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Premium Quality</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Quality: High</span>
                                    <span>30% Demand</span>
                                </div>
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 30%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px;">
                                    <span class="fw-bold">C</span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Fine Sand</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Quality: Standard</span>
                                    <span>15% Demand</span>
                                </div>
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 15%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px;">
                                    <span class="fw-bold">D</span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Coarse Sand</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Quality: Standard</span>
                                    <span>7% Demand</span>
                                </div>
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 7%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px;">
                                    <span class="fw-bold">E</span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Specialized</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Quality: Premium</span>
                                    <span>3% Demand</span>
                                </div>
                                <div class="progress mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 3%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Tenders -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card fade-in">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Upcoming Tender Deadlines</h5>
                        <a href="#" class="btn btn-sm btn-primary">View All Tenders</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="d-flex border rounded p-3">
                                    <div class="me-3">
                                        <div class="bg-primary text-white rounded text-center p-2" style="width: 60px;">
                                            <div class="fw-bold">JUN</div>
                                            <div class="fs-4">20</div>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Construction Grade Sand Supply</h6>
                                        <p class="text-muted mb-1">Supply of 10,000 CFT construction grade sand</p>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            <span>River Point A</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="d-flex border rounded p-3">
                                    <div class="me-3">
                                        <div class="bg-success text-white rounded text-center p-2" style="width: 60px;">
                                            <div class="fw-bold">JUN</div>
                                            <div class="fs-4">25</div>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Premium Quality Sand</h6>
                                        <p class="text-muted mb-1">Supply of 5,000 CFT premium quality sand</p>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            <span>River Point B</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="d-flex border rounded p-3">
                                    <div class="me-3">
                                        <div class="bg-warning text-white rounded text-center p-2" style="width: 60px;">
                                            <div class="fw-bold">JUN</div>
                                            <div class="fs-4">30</div>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Bulk Sand Supply Contract</h6>
                                        <p class="text-muted mb-1">Annual contract for 50,000 CFT sand</p>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            <span>Multiple Points</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <div class="d-flex border rounded p-3">
                                    <div class="me-3">
                                        <div class="bg-danger text-white rounded text-center p-2" style="width: 60px;">
                                            <div class="fw-bold">JUL</div>
                                            <div class="fs-4">05</div>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Fine Sand for Concrete Production</h6>
                                        <p class="text-muted mb-1">Supply of 8,000 CFT fine sand</p>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            <span>River Point C</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection