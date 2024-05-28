<div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h2 class="mb-0 font-weight-bolder opacity-4">LIST OF TICKETS</h2>
                            </div>
                        </div> <!-- /. div d-flex flex-row justify-content-between -->
                        <br>
                        <div class="d-flex flex-row justify-content">
                            <div class="col-md-1">
                                <select class="custom-select" wire:model="per_page">
                                    <option value="10">10 per page</option>
                                    <option value="25">25 per page</option>
                                    <option value="50">50 per page</option>
                                </select>
                            </div> <!-- /. div col-md-1 -->
                            <div class="col-md-1">
                                <select class="custom-select" wire:model="status">
                                    <option value="all">All Status</option>
                                    <option value="solved">Solved</option>
                                    <option value="in process">In Process</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div> <!-- /. div col-md-1 -->
                            <div class="col-md-1">
                                <select class="custom-select" wire:model="priority">
                                    <option value="all">All Priorities</option>
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                            </div> <!-- /. div col-md-1 -->
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="search ticket by author or problem..." wire:model="search">
                            </div> <!-- /. div col-md-9 -->
                        </div> <!-- /. div d-flex flex-row justify-content -->
                    </div> <!-- /. div card-header pb-0 -->

                    <br> <hr> <br>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" role="button" wire:click="order_by('problem')">Problem
                                            @if ( $order_by == 'problem' )
                                                @if ( $sort_direction == 'asc' ) <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i> @else <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i> @endif
                                            @else 
                                                <i class="fas fa-sort float-right mt-1"></i>
                                            @endif
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" role="button" wire:click="order_by('created_at')">Created at
                                            @if ( $order_by == 'created_at' )
                                                @if ( $sort_direction == 'asc' ) <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i> @else <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i> @endif
                                            @else 
                                                <i class="fas fa-sort float-right mt-1"></i>
                                            @endif
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" role="button" wire:click="order_by('asigned_to')">Asigned To
                                            @if ( $order_by == 'asigned_to' )
                                                @if ( $sort_direction == 'asc' ) <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i> @else <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i> @endif
                                            @else 
                                                <i class="fas fa-sort float-right mt-1"></i>
                                            @endif
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" role="button" wire:click="order_by('status')">Status
                                            @if ( $order_by == 'status' )
                                                @if ( $sort_direction == 'asc' ) <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i> @else <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i> @endif
                                            @else 
                                                <i class="fas fa-sort float-right mt-1"></i>
                                            @endif
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" role="button" wire:click="order_by('priority')">Priority
                                            @if ( $order_by == 'priority' )
                                                @if ( $sort_direction == 'asc' ) <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i> @else <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i> @endif
                                            @else 
                                                <i class="fas fa-sort float-right mt-1"></i>
                                            @endif
                                        </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $link_list as $link )
                                    <tr> 
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $link->user->name }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $link->user->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $link->problem }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $link->created_at }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">{{ $link->asignedTo->name ?? 'unasigned' }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge badge-sm @if( $link->status == 'solved' ) bg-gradient-success @elseif( $link->status == 'pending' ) bg-gradient-danger @else bg-gradient-info @endif"
                                                role="button" wire:click="change_ticket_status({{ $link->id }})">
                                                {{ $link->status }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="badge badge-sm @if( $link->priority == 'high' ) bg-gradient-success @elseif( $link->priority == 'medium' ) bg-gradient-warning @else bg-gradient-danger @endif"
                                                role="button" wire:click="change_priority({{ $link->id }})">
                                                {{ $link->priority }}
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <a class="text-secondary font-weight-bold text-xs" href="{{ route('ticket-show', [ 'id' => $link->id ]) }}"
                                                data-bs-toggle="tooltip" data-bs-original-title="show ticket">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            &nbsp;
                                            <button class="text-secondary font-weight-bold text-xs" onclick="Livewire.emit('openModal', 'tickets.ticket-asign', {{ json_encode(['ticket_id' => $link->id]) }})"
                                                data-bs-toggle="tooltip" data-bs-original-title="asign user to ticket">
                                                <i class="fas fa-user-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /. div table-responsive p-0 -->
                    </div> <!-- /. div card-body px-0 pt-0 pb-2 -->

                    <div class="card-footer">
                        <br>
                        @if ( $tickets->count() )
                            {{ $tickets->links() }}
                        @else
                            <p>There isn't results searching "{{ $search }}" in the page {{ $page }} showing {{ $per_page }} per page...</p>
                        @endif
                    </div> <!-- /. div card-footer -->

                    <div wire:loading.table>
                        <div class="d-flex align-items-center ms-5 me-5 mb-3">
                            <strong>Loading...</strong>
                            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                        </div>
                    </div> <!-- /. div wire:loading.table -->

                </div> <!-- /. div card mb-4 -->
            </div> <!-- /. div col-12 -->
        </div> <!-- /. div row -->
    </div> <!-- /. div container-fluid py-4 -->

</div>
