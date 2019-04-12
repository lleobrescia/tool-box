const { __ } = wp.i18n; // Import __() from wp.i18n
const {
    registerBlockType,
} = wp.blocks; // Import from wp.blocks

const {
    PanelBody,
    PanelRow
} = wp.components;

const {
    Fragment
} = wp.element;

const {
    BlockControls,
    InspectorControls
} = wp.editor;

const yasrOptionalText = __('All these settings are optional', 'yet-another-stars-rating');

const yasrLabelSelectSize = __('Choose Size', 'yet-another-stars-rating');

const yasrSelectSizeChoose = __('Choose stars size', 'yet-another-stars-rating');
const yasrSelectSizeSmall = __('Small', 'yet-another-stars-rating');
const yasrSelectSizeMedium = __('Medium', 'yet-another-stars-rating');
const yasrSelectSizeLarge = __('Large', 'yet-another-stars-rating');

const yasrLeaveThisBlankText = __('Leave this blank if you don\'t know what you\'re doing.', 'yet-another-stars-rating');

const yasrOverallDescription = __('Remember: only the post author can rate here.', 'yet-another-stars-rating');
const yasrVisitorVotesDescription = __('This is the star set where your users will be able to vote', 'yet-another-stars-rating');


/**
 * Register: a Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */

    registerBlockType(

        'yet-another-stars-rating/yasr-overall-rating', {
            title: __( 'Yasr: Overall Rating', 'yet-another-stars-rating' ),
            description: __('Insert the author rating', ''),
            icon: 'star-half',
            category: 'yet-another-stars-rating',
            keywords: [
                        __('rating', 'yet-another-stars-rating'),
                        __('author', 'yet-another-stars-rating'),
                        __('overall', 'yet-another-stars-rating')
                        ],
            attributes: {
                //should be needed just overallRatingMeta:
                //but, after the post is saved/updated
                //the meta filed returns always undefined
                //see this bug https://github.com/WordPress/gutenberg/issues/4989
                overallRatingMeta: {
                    type: 'number',
                    source: 'meta',
                    meta: 'yasr_overall_rating'
                },
                overallRatingAttribute: {
                    type: 'number',
                    default: 0
                },
                size: {
                    type: 'string',
                    default: '--'
                },
                postId: {
                    type: 'number',
                    default: ''
                },
            },

            edit:

                function( props ) {

                    const { attributes: {overallRatingMeta, overallRatingAttribute, size, postId }, setAttributes, isSelected } = props;

                    let overallRating = 0;

                    if (overallRatingAttribute === 0) {
                        overallRating = overallRatingMeta;
                        setAttributes( { overallRatingAttribute: overallRatingMeta } );
                    }
                    else {
                        overallRating = overallRatingAttribute;
                    }

                    let sizeAttribute = null;
                    let postIdAttribute = null;
                    let isNum = false;

                    if (size !== '--') {
                        sizeAttribute = ' size="' + size + '"';
                    }

                    isNum = /^\d+$/.test(postId);

                    if (postId && isNum === true) {
                        postIdAttribute = ' postid="' +postId + '"';
                    }

                    class YasrCreateDivRater extends React.Component {

                        constructor(props) {
                            super(props);
                            //const divOverall = React.createRef();
                        }

                        render () {
                            return (
                                <div>
                                    <div id="overall-rater" ref={()=>
                                    raterJs({
                                        starSize: 32,
                                        step: 0.1,
                                        showToolTip: false,
                                        rating: overallRating,
                                        readOnly: false,
                                        element: document.querySelector("#overall-rater"),
                                        rateCallback: function rateCallback(rating, done) {

                                            rating = rating.toFixed(1);
                                            rating = parseFloat(rating);

                                            setAttributes( { overallRatingAttribute: rating } );

                                            //show the load. IF insert before setAttributes, doesn't work
                                            jQuery('#loader-overall-rating').show();

                                            this.setRating(rating);

                                            const currentPostId = wp.data.select("core/editor").getCurrentPostId();

                                            var data = {
                                                action: 'yasr_send_overall_rating',
                                                yasr_nonce_overall_rating: yasrConstantGutenberg.nonceOverall,
                                                yasr_overall_rating: rating,
                                                post_id: currentPostId
                                            };

                                            //Send value to the Server
                                            jQuery.post(ajaxurl, data, function(response) {
                                                jQuery('#loader-overall-rating').hide();
                                                response = JSON.parse(response);
                                                if (response === 'OK') {
                                                    jQuery('#yasr-rateit-overall-value').text('You\'ve rated it: ' + rating);
                                                }
                                            });

                                            done();

                                        }
                                    })

                                    }
                                />

                                </div>
                            );
                        }

                    }

                    function YasrDivRatingOverall (props) {

                        const yasrOverallRateThis = __("Rate this article / item", 'yet-another-stars-rating');
                        const yasrLoading = __("Loading, please wait",'yet-another-stars-rating');
                        const hideLoaderOverall = {display: 'none'};

                        return (
                            <div>
                                {yasrOverallRateThis}
                                <YasrCreateDivRater />

                                <span id="loader-overall-rating" style={hideLoaderOverall}>
                                    {yasrLoading} <img src={yasrCommonDataAdmin.loaderHtml} />
                                </span>

                                <div id="yasr-rateit-overall-value" >
                                </div>

                            </div>

                        );

                    }

                    function YasrPrintSelectSize () {
                        return (
                            <form>
                                <select value={size} onChange={ yasrSetStarsSize }>
                                    <option value="--">{yasrSelectSizeChoose}</option>
                                    <option value="small">{yasrSelectSizeSmall}</option>
                                    <option value="medium">{yasrSelectSizeMedium}</option>
                                    <option value="large">{yasrSelectSizeLarge}</option>
                                </select>
                            </form>
                        );
                    }

                    function yasrSetStarsSize(event) {
                        const selected = event.target.querySelector( 'option:checked' );
                        setAttributes( { size: selected.value } );
                        event.preventDefault();
                    }

                    function YasrPrintInputId() {
                        return (
                            <div>
                                <input type="text" size="4" onKeyPress={yasrSetPostId} />
                            </div>
                        );
                    }

                    function yasrSetPostId (event) {
                        if (event.key === 'Enter') {
                            const postIdValue = event.target.value;

                            //postID is always a string, here I check if this string is made only by digits
                            var isNum = /^\d+$/.test(postIdValue);

                            if (isNum === true) {
                                setAttributes({postId: postIdValue})
                            }
                            event.preventDefault();
                        }
                    }

                    function YasrOverallPanel (props) {

                        return (
                            <InspectorControls>
                                <div class="yasr-guten-block-panel yasr-guten-block-panel-center">
                                    <YasrDivRatingOverall />
                                </div>

                                <PanelBody title='Settings'>
                                    <h3>{yasrOptionalText}</h3>

                                    <div className="yasr-guten-block-panel">
                                        <label>{yasrLabelSelectSize}</label>
                                        <div>
                                            <YasrPrintSelectSize />
                                        </div>
                                    </div>

                                    <div className="yasr-guten-block-panel">
                                        <label>Post ID</label>
                                        <YasrPrintInputId/>
                                        <div className="yasr-guten-block-explain">
                                            {yasrLeaveThisBlankText}
                                        </div>
                                    </div>

                                    <div className="yasr-guten-block-panel">
                                        {yasrOverallDescription}
                                    </div>
                                </PanelBody>
                            </InspectorControls>
                        );

                    }

                    return (
                        <Fragment>
                            <YasrOverallPanel />
                            <div className={ props.className }>
                                [yasr_overall_rating{sizeAttribute}{postIdAttribute}]
                                {isSelected && <YasrPrintSelectSize />}
                            </div>
                        </Fragment>
                    );
                },

            /**
             * The save function defines the way in which the different attributes should be combined
             * into the final markup, which is then serialized by Gutenberg into post_content.
             *
             * The "save" property must be specified and must be a valid function.
             *
             * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
             */
            save:
                function( props ) {
                    const { attributes: {overallRatingAttribute, size, postId }} = props;

                    console.log(props);

                    let yasrOverallAttributes = null;

                    if (size) {
                        yasrOverallAttributes += ' size="' +size+ '"';
                    }
                    if (postId) {
                        yasrOverallAttributes += ' postid="'+postId+'"';
                    }

                    return (
                        <p>[yasr_overall_rating {yasrOverallAttributes}]</p>
                    );
                },

        });


    registerBlockType(

        'yet-another-stars-rating/yasr-visitor-votes', {

            title: __( 'Yasr: Visitor Votes', 'yet-another-stars-rating' ),
            description: __('Insert the ability for your visitors to vote', 'yet-another-stars-rating'),
            icon: 'star-half',
            category: 'yet-another-stars-rating',
            keywords: [
                __('rating', 'yet-another-stars-rating'),
                __('visitor', 'yet-another-stars-rating'),
                __('votes', 'yet-another-stars-rating')
            ],
            attributes: {
                //name of the attribute
                size: {
                    type: 'string',
                    default: '--'
                },
                postId: {
                    type: 'int',
                    default: ''
                },
            },

            edit:

                function( props ) {

                    const { attributes: { size, postId }, setAttributes, isSelected } = props;

                    let sizeAttribute = null;
                    let postIdAttribute = null;
                    let isNum = false;

                    isNum = /^\d+$/.test(postId);

                    if (size !== '--') {
                        sizeAttribute = ' size="' + size + '"';
                    }

                    if (postId && isNum === true) {
                        postIdAttribute = ' postid="' +postId + '"';
                    }


                    function YasrPrintSelectSize () {
                        return (
                            <form>
                                <select value={size} onChange={ yasrSetStarsSize }>
                                    <option value="--">{yasrSelectSizeChoose}</option>
                                    <option value="small">{yasrSelectSizeSmall}</option>
                                    <option value="medium">{yasrSelectSizeMedium}</option>
                                    <option value="large">{yasrSelectSizeLarge}</option>
                                </select>
                            </form>
                        );
                    }

                    function yasrSetStarsSize(event) {
                        const selected = event.target.querySelector( 'option:checked' );
                        setAttributes( { size: selected.value } );
                        event.preventDefault();
                    }

                    function YasrPrintInputId() {
                        return (
                            <div>
                                <input type="text" size="4" onKeyPress={yasrSetPostId} />
                            </div>
                        );
                    }

                    function yasrSetPostId (event) {
                        if (event.key === 'Enter') {
                            const postIdValue = event.target.value;

                            //postID is always a string, here I check if this string is made only by digits
                            var isNum = /^\d+$/.test(postIdValue);

                            if (isNum === true) {
                                setAttributes({postId: postIdValue})
                            }
                            event.preventDefault();
                        }
                    }

                    function YasrVVPanel (props) {

                        return (
                            <InspectorControls>

                                <PanelBody title='Settings'>
                                    <h3>{yasrOptionalText}</h3>

                                    <div className="yasr-guten-block-panel">
                                        <label>{yasrLabelSelectSize}</label>
                                        <div>
                                            <YasrPrintSelectSize />
                                        </div>
                                    </div>

                                    <div className="yasr-guten-block-panel">
                                        <label>Post ID</label>
                                        <YasrPrintInputId/>
                                        <div className="yasr-guten-block-explain">
                                            {yasrLeaveThisBlankText}
                                        </div>
                                    </div>

                                    <div className="yasr-guten-block-panel">
                                        {yasrVisitorVotesDescription}
                                    </div>
                                </PanelBody>
                            </InspectorControls>
                        );

                    }

                    return (
                        <Fragment>
                            <YasrVVPanel />
                            <div className={ props.className }>
                                [yasr_visitor_votes{sizeAttribute}{postIdAttribute}]
                                {isSelected && <YasrPrintSelectSize />}
                            </div>
                        </Fragment>
                    );
                },

            /**
             * The save function defines the way in which the different attributes should be combined
             * into the final markup, which is then serialized by Gutenberg into post_content.
             *
             * The "save" property must be specified and must be a valid function.
             *
             * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
             */
            save:
                function( props ) {
                    const { attributes: {size, postId} } = props;

                    let yasrVVAttributes = null;

                    if (size) {
                        yasrVVAttributes += ' size="' +size+ '"';
                    }
                    if (postId) {
                        yasrVVAttributes += ' postid="'+postId+'"';
                    }

                    return (
                        <p>[yasr_visitor_votes {yasrVVAttributes}]</p>
                    );
                },

    });