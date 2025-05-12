<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Manager | {{ $title ?? 'Dashboard' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --dark: #212529;
            --light: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: var(--dark);
            color: white;
        }
        .main-content {
            background: #f5f7fa;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-action {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3" style="width: 250px;">
            <div class="text-center mb-4">
                <h4><i class="fas fa-box-open me-2"></i> Product Manager</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('products.index') }}">
                        <i class="fas fa-list me-2"></i> Product List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.create') }}">
                        <i class="fas fa-plus-circle me-2"></i> Add Product
                    </a>
                </li>
            </ul>
        </div>

        <div class="container-fluid py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-0 text-gradient">
                        <i class="fas fa-boxes me-2"></i>Product Gallery
                    </h2>
                    <p class="text-muted mb-0">Manage your product collection</p>
                </div>
                <a href="{{ route('products.create') }}" class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus me-2"></i> Add Product
                </a>
            </div>

            <!-- Menampilkan produk jika ada data produk -->
            @if ($products->isNotEmpty())
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="py-3 ps-4">#ID</th>
                                        <th class="py-3">Product</th>
                                        <th class="py-3">Description</th>
                                        <th class="py-3 text-end pe-4">Price</th>
                                        <th class="py-3 text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
    <tr>
        <td class="fw-bold ps-4">#{{ $product->id_produk }}</td>
        <td>
            <div class="d-flex align-items-center">
                <div class="product-icon me-3">
                    <i class="fas fa-box"></i>
                </div>
                <div>
                    <h6 class="mb-0">{{ $product->nama }}</h6>
                    <small class="text-muted">Last updated: {{ \Carbon\Carbon::parse($product->created_at)->format('M d, Y') }}</small>
                </div>
            </div>
        </td>
        <td class="text-truncate" style="max-width: 250px;">
            {{ $product->deskripsi }}
        </td>
        <td class="text-end pe-4">
            <span class="price-badge">
                Rp {{ number_format($product->harga, 0, ',', '.') }}
            </span>
        </td>
        <td class="text-center">
            <div class="d-flex justify-content-center gap-2">
                <!-- Pastikan parameter 'id' dikirimkan di sini -->
                <a href="{{ route('products.edit', $product->id_produk) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                    <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{ route('products.destroy', $product->id_produk) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Delete this product?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
@endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <!-- Menampilkan jika produk kosong -->
                <div class="empty-state text-center py-5 my-5">
                    <div class="mb-4">
                        <i class="fas fa-box-open fa-4x text-muted opacity-25"></i>
                    </div>
                    <h3 class="fw-bold text-muted mb-3">Your gallery is empty</h3>
                    <p class="text-muted mb-4">Let's add your first product masterpiece!</p>
                    <a href="{{ route('products.create') }}" class="btn btn-primary px-4">
                        <i class="fas fa-plus me-2"></i> Create First Product
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
