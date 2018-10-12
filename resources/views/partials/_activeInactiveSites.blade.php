					<!-- Modal -->
					<div class="modal fade" id="disable{{ $site->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLongTitle">Please Confirm!</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <h5>Would you like to {{ $site->status == 'N' ? 'Activate' : 'Deactive' }} this record?</h5>
					        {!! Form::model($site, ['route' => ['sitesInactive.update', $site->id], 'method' => 'PUT']) !!}
					        <input type="hidden" name="status" id="status" value="{{ $site->status == 'N' ? 'Y' : 'N' }}">
					          <div class="form-group">
							   		<div class="form-group">
								   		<label for="reasons">Reason:</label>
								   		<textarea class="form-control" id="reasons" name="reasons" rows="3">{{ $site->reasons }}</textarea>
									</div>
							  </div>
					      </div>
					      <div class="modal-footer">
					      	<button type="submit" class="btn btn-primary">Save changes</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					      </div>
					      {!! Form::close() !!}
					    </div>
					  </div>
					</div>