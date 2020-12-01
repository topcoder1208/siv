<?php

return [
    'userManagement'          => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'              => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'                    => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'                    => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'brand'                   => [
        'title'          => 'Brand',
        'title_singular' => 'Brand',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nome',
            'name_helper'       => 'INSERISCI IL NOME DEL BRAND DA GESTIRE',
            'attivo'            => 'Attivo',
            'attivo_helper'     => 'A FINE MANDATO SETTARE COME ARCHIVIATO',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'logo'              => 'Logo',
            'logo_helper'       => 'INSERISCI IL LOGO DEL BRAND CON FORMATO QUADRATO',
        ],
    ],
    'offerte'                 => [
        'title'          => 'Servizio',
        'title_singular' => 'Servizio',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'nome'                   => 'Nome',
            'nome_helper'            => 'IL NOME DELL\'OFFERTA DA GESTIRE',
            'fine_validita'          => 'Fine Validità',
            'fine_validita_helper'   => 'FINE VALIDITA\' OFFERTA',
            'inizio_validita'        => 'Inizio Validità',
            'inizio_validita_helper' => 'PERIODO DI INIZIO VALIDITA\' OFFERTA',
            'brand'                  => 'Brand',
            'brand_helper'           => ' ',
            'tipologia'              => 'Tipologia',
            'tipologia_helper'       => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'tecnologia'             => 'Tecnologia',
            'tecnologia_helper'      => ' ',
        ],
    ],
    'anagrafiche'             => [
        'title'          => 'Anagrafiche Prodotti',
        'title_singular' => 'Anagrafiche Prodotti',
    ],
    'categorie'               => [
        'title'          => 'Categorie',
        'title_singular' => 'Categorie',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nome'              => 'Nome',
            'nome_helper'       => ' ',
            'attivo'            => 'Attivo',
            'attivo_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'tipologia'         => 'Tipologia',
            'tipologia_helper'  => ' ',
            'brand'             => 'Brand',
            'brand_helper'      => ' ',
        ],
    ],
    'tecnologium'             => [
        'title'          => 'Tecnologia',
        'title_singular' => 'Tecnologium',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nome'              => 'Nome',
            'nome_helper'       => ' ',
            'categoria'         => 'Categoria',
            'categoria_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'attivo'            => 'Attivo',
            'attivo_helper'     => ' ',
        ],
    ],
    'elenchi'                 => [
        'title'          => 'Elenchi',
        'title_singular' => 'Elenchi',
    ],
    'regioni'                 => [
        'title'          => 'Regioni',
        'title_singular' => 'Regioni',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'regione'           => 'Regione',
            'regione_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'province'                => [
        'title'          => 'Province',
        'title_singular' => 'Province',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'provincia'         => 'Provincia',
            'provincia_helper'  => ' ',
            'regione'           => 'Regione',
            'regione_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'cittum'                  => [
        'title'          => 'Citta',
        'title_singular' => 'Cittum',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'cap'               => 'Cap',
            'cap_helper'        => ' ',
            'citta'             => 'Città',
            'citta_helper'      => ' ',
            'provincia'         => 'Provincia',
            'provincia_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'geografici'              => [
        'title'          => 'Geografici',
        'title_singular' => 'Geografici',
    ],
    'gare'                    => [
        'title'          => 'Gare',
        'title_singular' => 'Gare',
    ],
    'notizie'                 => [
        'title'          => 'Notizie',
        'title_singular' => 'Notizie',
        'fields'         => [
            'id'                            => 'ID',
            'id_helper'                     => ' ',
            'titolo'                        => 'Titolo',
            'titolo_helper'                 => ' ',
            'brand'                         => 'Brand',
            'brand_helper'                  => ' ',
            'descrizione_breve'             => 'Descrizione Breve',
            'descrizione_breve_helper'      => ' ',
            'inizio_visualizzazione'        => 'Inizio Visualizzazione',
            'inizio_visualizzazione_helper' => ' ',
            'fine_visualizzazione'          => 'Fine Visualizzazione',
            'fine_visualizzazione_helper'   => ' ',
            'visualizza_primapagina'        => 'Visualizza Primapagina',
            'visualizza_primapagina_helper' => ' ',
            'file_pdf'                      => 'File Pdf',
            'file_pdf_helper'               => ' ',
            'link'                          => 'Link',
            'link_helper'                   => ' ',
            'autorizzati'                   => 'Autorizzati',
            'autorizzati_helper'            => ' ',
            'created_at'                    => 'Created at',
            'created_at_helper'             => ' ',
            'updated_at'                    => 'Updated at',
            'updated_at_helper'             => ' ',
            'deleted_at'                    => 'Deleted at',
            'deleted_at_helper'             => ' ',
        ],
    ],
    'vendite'                 => [
        'title'          => 'Vendite',
        'title_singular' => 'Vendite',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'data_inserimento'        => 'Data',
            'data_inserimento_helper' => ' ',
            'ora_inserimento'         => 'Ora',
            'ora_inserimento_helper'  => ' ',
            'operatore'               => 'Operatore',
            'operatore_helper'        => ' ',
            'servizio'                => 'Servizio',
            'servizio_helper'         => ' ',
            'quantita'                => 'Quantità',
            'quantita_helper'         => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'id_agente'               => 'Agente',
            'id_agente_helper'        => ' ',
            'id_point'                => 'Point',
            'id_point_helper'         => ' ',
        ],
    ],
    'gareInserimento'         => [
        'title'          => 'Gare Inserimento',
        'title_singular' => 'Gare Inserimento',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'tipologia_gara'               => 'Tipologia Gara',
            'tipologia_gara_helper'        => ' ',
            'brand_tipologia'              => 'Brand Tipologia',
            'brand_tipologia_helper'       => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'visibilita'                   => 'Visibilità',
            'visibilita_helper'            => ' ',
            'esito_negativo'               => 'Esito Negativo',
            'esito_negativo_helper'        => ' ',
            'numero_fasce_previste'        => 'Numero Fasce Previste',
            'numero_fasce_previste_helper' => ' ',
            'servizi'                      => 'Servizi',
            'servizi_helper'               => ' ',
            'validita_inizio'              => 'Validita Inizio',
            'validita_inizio_helper'       => ' ',
            'validita_fine'                => 'Validita Fine',
            'validita_fine_helper'         => ' ',
            'metodo_attribuzione'          => 'Metodo Attribuzione',
            'metodo_attribuzione_helper'   => ' ',
            'metodo_calcolo'               => 'Metodo Calcolo',
            'metodo_calcolo_helper'        => ' ',
            'metodo_famiglia'              => 'Metodo Famiglia',
            'metodo_famiglia_helper'       => ' ',
            'titolo'                       => 'Titolo',
            'titolo_helper'                => ' ',
            'esito'                        => 'L\'esito della gara determinerà un impatto su altre gare?',
            'esito_helper'                 => ' ',
            'esito_incremento'             => 'aumentare i compensi con un incremento percentuale al raggiungimento dell\'obiettivo fissato in gara',
            'esito_incremento_helper'      => ' ',
            'esito_decremento'             => 'ridurre i compensi con un decremento percentuale al mancato raggiungimento dell\'obiettivo fissato in gara',
            'esito_decremento_helper'      => ' ',
        ],
    ],
    'soggettiTipologium'      => [
        'title'          => 'Soggetti Tipologia',
        'title_singular' => 'Soggetti Tipologium',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'tipologia'         => 'Tipologia',
            'tipologia_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'gareInserimentoDettagli' => [
        'title'          => 'Gare Inserimento Dettagli',
        'title_singular' => 'Gare Inserimento Dettagli',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'gara_inserimento'          => 'Gara Inserimento',
            'gara_inserimento_helper'   => ' ',
            'tipologia'                 => 'Tipologia',
            'tipologia_helper'          => ' ',
            'valore_n_1'                => 'Valore N 1',
            'valore_n_1_helper'         => ' ',
            'valore_n_2'                => 'Valore N 2',
            'valore_n_2_helper'         => ' ',
            'descrizione_valore'        => 'Descrizione Valore',
            'descrizione_valore_helper' => ' ',
        ],
    ],
    'inserimentoGareSoglie'   => [
        'title'          => 'Inserimento Gare Soglie',
        'title_singular' => 'Inserimento Gare Soglie',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'premio'             => 'Premio',
            'premio_helper'      => ' ',
            'titolo'             => 'Titolo',
            'titolo_helper'      => ' ',
            'servizio'           => 'Servizio',
            'servizio_helper'    => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'percentuale'        => 'Percentuale',
            'percentuale_helper' => ' ',
            'quantita'           => 'Quantità',
            'quantita_helper'    => ' ',
        ],
    ],
    'inserimentoSoglieRange'  => [
        'title'          => 'Inserimento Soglie Range',
        'title_singular' => 'Inserimento Soglie Range',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'gara'                  => 'Gara',
            'gara_helper'           => ' ',
            'percentuale'           => 'Percentuale',
            'percentuale_helper'    => ' ',
            'soglia_minima'         => 'Soglia Minima',
            'soglia_minima_helper'  => ' ',
            'soglia_massima'        => 'Soglia Massima',
            'soglia_massima_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'soggettiFatturato'       => [
        'title'          => 'Soggetti Fatturato',
        'title_singular' => 'Soggetti Fatturato',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'anno'              => 'Anno',
            'anno_helper'       => ' ',
            'mese'              => 'Mese',
            'mese_helper'       => ' ',
            'telefoni'          => 'Telefoni',
            'telefoni_helper'   => ' ',
            'card'              => 'Card',
            'card_helper'       => ' ',
            'servizi'           => 'Servizi',
            'servizi_helper'    => ' ',
            'altro'             => 'Altro',
            'altro_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'userParameter'           => [
        'title'          => 'User Parameters',
        'title_singular' => 'User Parameter',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'tipologia'         => 'Tipologia',
            'tipologia_helper'  => ' ',
            'parametro'         => 'Parametro',
            'parametro_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'soggettiRelationship'    => [
        'title'          => 'Soggetti Mandati',
        'title_singular' => 'Soggetti Mandati',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'brand'             => 'Brand',
            'brand_helper'      => ' ',
            'inizio'            => 'Inizio',
            'inizio_helper'     => ' ',
            'fine'              => 'Fine',
            'fine_helper'       => ' ',
            'status'            => 'Stato',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'id_dealer'         => 'Dealer',
            'id_dealer_helper'  => ' ',
        ],
    ],
    'grabDataMexal'           => [
        'title'          => 'Prelievo Dati Mexal',
        'title_singular' => 'Prelievo Dati Mexal',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nomefile'          => 'Nomefile',
            'nomefile_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'exportlog'               => [
        'title'          => 'LOG FILE',
        'title_singular' => 'LOG FILE',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nome_file'         => 'Nome File',
            'nome_file_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'systemTable'             => [
        'title'          => 'Tabelle di Sistema',
        'title_singular' => 'Tabelle di Sistema',
    ],
    'organizzazione'          => [
        'title'          => 'Organizzazione',
        'title_singular' => 'Organizzazione',
    ],
    'dealer'                  => [
        'title'          => 'Dealer',
        'title_singular' => 'Dealer',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'dealer'                   => 'Dealer',
            'dealer_helper'            => ' ',
            'indirizzo'                => 'Indirizzo',
            'indirizzo_helper'         => ' ',
            'cap'                      => 'CAP',
            'cap_helper'               => ' ',
            'citta'                    => 'Città',
            'citta_helper'             => ' ',
            'provincia'                => 'Provincia',
            'provincia_helper'         => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'telefono'                 => 'Telefono',
            'telefono_helper'          => ' ',
            'conto_contabilita'        => 'Codice Conto MEXAL',
            'conto_contabilita_helper' => ' ',
            'codice'                   => 'Codice Dealer',
            'codice_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'stato'                    => 'Stato',
            'stato_helper'             => ' ',
        ],
    ],
    'dealerPoint'             => [
        'title'          => 'Points',
        'title_singular' => 'Point',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'id_dealer'                => 'Dealer',
            'id_dealer_helper'         => ' ',
            'conto_contabilita'        => 'Conto Contabilita',
            'conto_contabilita_helper' => ' ',
            'codice'                   => 'Codice',
            'codice_helper'            => ' ',
            'point'                    => 'Point',
            'point_helper'             => ' ',
            'indirizzo'                => 'Indirizzo',
            'indirizzo_helper'         => ' ',
            'cap'                      => 'CAP',
            'cap_helper'               => ' ',
            'citta'                    => 'Città',
            'citta_helper'             => ' ',
            'provincia'                => 'Provincia',
            'provincia_helper'         => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'telefono'                 => 'Telefono',
            'telefono_helper'          => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'agenti'                  => [
        'title'          => 'Agenti',
        'title_singular' => 'Agenti',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'id_brand'                    => 'Brand',
            'id_brand_helper'             => ' ',
            'codice'                      => 'Codice',
            'codice_helper'               => ' ',
            'agente'                      => 'Agente',
            'agente_helper'               => ' ',
            'conto_contabilita'           => 'Conto Contabilita',
            'conto_contabilita_helper'    => ' ',
            'indirizzo'                   => 'Indirizzo',
            'indirizzo_helper'            => ' ',
            'cap'                         => 'CAP',
            'cap_helper'                  => ' ',
            'citta'                       => 'Città',
            'citta_helper'                => ' ',
            'provincia'                   => 'Provincia',
            'provincia_helper'            => ' ',
            'email'                       => 'Email',
            'email_helper'                => ' ',
            'telefono'                    => 'Telefono',
            'telefono_helper'             => ' ',
            'agenzia_responsabile'        => 'Responsabile Agenzia',
            'agenzia_responsabile_helper' => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
        ],
    ],
    'dealerMandati'           => [
        'title'          => 'Mandati',
        'title_singular' => 'Mandati',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'brand'             => 'Brand',
            'brand_helper'      => ' ',
            'inizio'            => 'Inizio',
            'inizio_helper'     => ' ',
            'fine'              => 'Fine',
            'fine_helper'       => ' ',
            'status'            => 'Stato',
            'status_helper'     => ' ',
            'id_dealer'         => 'Dealer',
            'id_dealer_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
