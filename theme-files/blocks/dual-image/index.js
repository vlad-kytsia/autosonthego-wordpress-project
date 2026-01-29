( function ( blocks, blockEditor, components, i18n, element ) {
    // Fallback для старих версій (якщо blockEditor не існує)
    blockEditor = blockEditor || window.wp.editor;

    var __ = i18n.__;
    var useBlockProps = blockEditor.useBlockProps;
    var MediaUpload = blockEditor.MediaUpload;
    var MediaUploadCheck = blockEditor.MediaUploadCheck;
    var Button = components.Button;
    var el = element.createElement;

    blocks.registerBlockType( 'autos/dual-image', {
        title: 'Dual Image (Desktop + Mobile)',
        icon: 'format-image',
        category: 'media',

        attributes: {
            desktopImage: {
                type: 'object',
                default: null
            },
            mobileImage: {
                type: 'object',
                default: null
            },
            alt: {
                type: 'string',
                default: ''
            }
        },

        // EDIT (backend)
        edit: function ( props ) {
            var attributes = props.attributes;
            var setAttributes = props.setAttributes;

            var desktopImage = attributes.desktopImage;
            var mobileImage = attributes.mobileImage;
            var alt = attributes.alt;

            var blockProps = useBlockProps( { className: 'dual-image-block' } );

            return el(
                'div',
                blockProps,

                // Desktop image group
                el(
                    'div',
                    { className: 'image-upload-group' },
                    el( 'h4', null, 'Desktop Image' ),

                    el(
                        MediaUploadCheck,
                        null,
                        el( MediaUpload, {
                            onSelect: function ( media ) {
                                setAttributes( { desktopImage: media } );
                            },
                            allowedTypes: [ 'image' ],
                            value: desktopImage && desktopImage.id,
                            render: function ( obj ) {
                                var open = obj.open;
                                return el(
                                    Button,
                                    { onClick: open, variant: 'primary' },
                                    desktopImage
                                        ? 'Change Desktop Image'
                                        : 'Upload Desktop Image'
                                );
                            }
                        } )
                    ),

                    desktopImage &&
                        el( 'img', {
                            className: 'preview',
                            src: desktopImage.url,
                            alt: ''
                        } )
                ),

                // Mobile image group
                el(
                    'div',
                    { className: 'image-upload-group' },
                    el( 'h4', null, 'Mobile Image' ),

                    el(
                        MediaUploadCheck,
                        null,
                        el( MediaUpload, {
                            onSelect: function ( media ) {
                                setAttributes( { mobileImage: media } );
                            },
                            allowedTypes: [ 'image' ],
                            value: mobileImage && mobileImage.id,
                            render: function ( obj ) {
                                var open = obj.open;
                                return el(
                                    Button,
                                    { onClick: open, variant: 'primary' },
                                    mobileImage
                                        ? 'Change Mobile Image'
                                        : 'Upload Mobile Image'
                                );
                            }
                        } )
                    ),

                    mobileImage &&
                        el( 'img', {
                            className: 'preview',
                            src: mobileImage.url,
                            alt: ''
                        } )
                )
            );
        },

        // SAVE (frontend)
        save: function ( props ) {
            var attributes = props.attributes;
            var desktopImage = attributes.desktopImage;
            var mobileImage = attributes.mobileImage;
            var alt = attributes.alt;

            var blockProps = useBlockProps.save( {
                className: 'dual-image-wrapper'
            } );

            return el(
                'picture',
                blockProps,
                mobileImage &&
                    el( 'source', {
                        media: '(max-width: 768px)',
                        srcSet: mobileImage.url
                    } ),
                desktopImage &&
                    el( 'source', {
                        media: '(min-width: 769px)',
                        srcSet: desktopImage.url
                    } ),
                el( 'img', {
                    src: desktopImage
                        ? desktopImage.url
                        : ( mobileImage ? mobileImage.url : '' ),
                    alt: alt || ''
                } )
            );
        }
    } );
} )(
    window.wp.blocks,
    window.wp.blockEditor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element
);
