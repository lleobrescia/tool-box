<?php
/**
* Register a post type, with REST API support
*
* Based on example at: http://codex.wordpress.org/Function_Reference/register_post_type
*
* @package Tool_Box
*/
add_action( 'init', 'custom_post_receitas' );
function custom_post_receitas()
{
    $labels = array(
    'name'               => _x( 'Receitas', 'post type general name' ),
    'singular_name'      => _x( 'Receita', 'post type singular name' ),
    'menu_name'          => _x( 'Receitas', 'admin menu' ),
    'name_admin_bar'     => _x( 'Receitas', 'add new on admin bar' ),
    'add_new'            => _x( 'Adicionar Nova', 'item' ),
    'add_new_item'       => __( 'Adicionar Nova' ),
    'new_item'           => __( 'Nova' ),
    'update_item'        => __( 'Salvar' ),
    'edit_item'          => __( 'Editar Receita' ),
    'view_item'          => __( 'Ver Receita' ),
    'all_items'          => __( 'Todas Receitas' ),
    'search_items'       => __( 'Procurar Receita' ),
    'parent_item_colon'  => __( 'Parent Itens:' ),
    'not_found'          => __( 'Receita não encontrado.' ),
    'not_found_in_trash' => __( 'Receita não encontrado.' )
    );

    $args = array(
    'labels'                => $labels,
    'public'                => true,
    'publicly_queryable'    => true,
    'show_ui'               => true,
    'show_in_rest'          => true,
    'show_in_menu'          => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'receita' ),
    'capability_type'       => 'post',
    'has_archive'           => true,
    'menu_icon'             => 'dashicons-welcome-write-blog',
    'hierarchical'          => false,
    'menu_position'         => 5,
    'rest_base'             => 'receita',
    'supports'              => array( 'title','categoria', 'editor', 'thumbnail')
    );

    register_post_type( 'receita', $args );
}

add_action( 'init', 'create_categoria_cat' );

function create_categoria_cat()
{
    register_taxonomy(
        'categoria',
        'receita',
        array(
            'label'        => __( 'Categorias' ),
            'rewrite'      => array( 'slug' => 'categorias' ),
            'hierarchical' => true,
            'show_in_rest' => true
        )
    );
}

/*
replacing the default "Enter title here" placeholder text in the title input box
with something more descriptive can be helpful for custom post types
place this code in your theme's functions.php or relevant file
source: http://flashingcursor.com/wordpress/change-the-enter-title-here-text-in-wordpress-963
*/
function chris_change_default_title($title)
{
    $screen = get_current_screen();
    if ('receita' == $screen->post_type) {
        $title = 'Nome';
    }

    return $title;
}
add_filter( 'enter_title_here', 'chris_change_default_title' );
