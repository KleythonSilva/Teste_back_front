import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PersonListComponent } from './person-list/person-list.component';
import { PersonFormComponent } from './person-form/person-form.component';

const routes: Routes = [
  { path: '', component: PersonFormComponent }, // Rota padrão para a criação de pessoas
  { path: 'list', component: PersonListComponent }, // Rota para a listagem de pessoas
  { path: 'edit/:id', component: PersonFormComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
