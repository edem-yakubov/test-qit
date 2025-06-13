import {Module} from '@nestjs/common';
import {ProductModule} from './modules/product/product.module';
import "reflect-metadata";
import {Product} from "./modules/product/entities/product.entity";
import {TypeOrmModule} from '@nestjs/typeorm';


@Module({
    imports: [
        TypeOrmModule.forRoot({
            type: 'better-sqlite3',
            database: './db/product.sqlite',
            entities: [Product],
            synchronize: true, // Set to false in production!
        }),
        ProductModule
    ],
    controllers: [],
    providers: [],
})
export class AppModule {
}
