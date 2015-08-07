<div class="container base-container">
	<div class="row">
		{if isset($session.pseudo)}
		<div class="col-md-4">
			<div class="bs-component">
				<div class="panel panel-success">
					<div class="panel-heading">Catégories</div>
					<div class="panel-body">
						<div class="list-group">
						    <div class="list-group-item">
								<div class="row-picture">
									<img class="circle" src="http://lorempixel.com/56/56/people/1" alt="icon">
								</div>
						        <div class="row-content">
						            <div class="action-secondary"><i class="mdi-material-info"></i></div>
						            <h4 class="list-group-item-heading">Tile with an icon</h4>
						            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
						        </div>
						    </div>
						    <div class="list-group-separator"></div>
						    <div class="list-group-item">
								<div class="row-picture">
									<img class="circle" src="http://lorempixel.com/56/56/people/1" alt="icon">
								</div>			        
						        <div class="row-content">
						            <div class="action-secondary"><i class="mdi-material-info"></i></div>
						            <h4 class="list-group-item-heading">Tile with an icon</h4>
						            <p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
						        </div>
						    </div>
						    <div class="list-group-separator"></div>
						    <div class="list-group-item">
								<div class="row-picture">
									<img class="circle" src="http://lorempixel.com/56/56/people/1" alt="icon">
								</div>	
						        <div class="row-content">
						            <div class="action-secondary"><i class="mdi-material-info"></i></div>
						            <h4 class="list-group-item-heading">Tile with an icon</h4>
						            <p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
						        </div>
						    </div>
						    <div class="list-group-separator"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="bs-component">
				<div class="panel panel-default">
					<div class="panel-heading">Mes Tâches</div>
					<div class="panel-body">
						<div class="tasks-container" id="checkbox">
							<div class="task-content" hidden>
								<div class="sample">
									<div class="text"></div>
									<div class="checkbox checkbox-material">
										<label>
											<input type="checkbox" class="checkbox-input">
										</label>
									</div>
								</div>
							</div>
							{if isset($tasks) && !empty($tasks)}
	                        	{foreach from=$tasks item=task}
	                        		<div class="sample" id="{$task->id}">
										<div class="text">{$task->task}</div>
										<div class="checkbox checkbox-material">
											<label>	
												<input type="checkbox" class="checkbox-input">
											</label>
										</div>
									</div>
								{/foreach}
	                        {/if}
                        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="bs-component">
				<div class="panel panel-default">
					<div class="panel-heading">Ajouter une tâche</div>
					<div class="panel-body">
						<div class="form-group has-success">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label" for="inputSuccess">Description de ma tâche</label>
	                            	<input type="text" maxlength="80" name="task-description" autocomplete="off" class="form-control" id="task-description">
		                            <button type="submit" name="add-task" class="btn btn-material-light-green add-task">
		                            	Ajouter
		                            </button>
								</div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		{/if}
		{if !isset($session.pseudo)}
		<div class="col-md-offset-4 col-md-offset-right-4 col-md-4">
			<div class="bs-component">
				<div class="connexion">
					<form action="accueil" method="post">
						<div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Votre pseudo</label>
                            <input type="text" name="pseudo" autocomplete="off" class="form-control" id="inputSuccess">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="connexion" class="btn btn-material-light-green">
                            	Connexion
                            </button>
                            <button type="submit" name="inscription" class="btn btn-material-deep-orange-900">
                            	Inscription
                            </button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
		{/if}
	</div>
</div>